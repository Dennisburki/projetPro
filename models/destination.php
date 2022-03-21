<?php


class Destinations extends DataBase
{
    /**
     * Permet d'afficher les différentes catégories de voyage
     */
    public function getCategories()
    {
        $base = $this->connectDb();
        $query = "SELECT `cat_category` FROM `pro_categories`";

        $resultQuery = $base->prepare($query);
        $resultQuery->execute();
        return $resultQuery->fetchAll();
    }


    /**
     * Permet de rajouter des destinations 
     * @param string $picture : photo d'illustration
     * @param string $title : Nom de la destination
     * @param string $descr : rapide descriptif des activités
     * @param string $cityCode : code openweathermap pour le widget meteo
     * @param string $iframe : iframe google pour la localisation
     * @param string $category : la categorie a laquelle appartient la destination
     */
    public function addDestination($picture, $title, $descr, $cityCode, $iframe, $category)
    {
        $base = $this->connectDb();
        $query = "INSERT INTO `pro_destination` (`des_picture`,`des_title`,`des_description`,`des_city_code`,`des_iframe`,`cat_id`)
        VALUES (:picture, :title, :descr, :cityCode, :iframe,(SELECT `cat_id` FROM `pro_categories` WHERE `cat_category` = :category))";

        $resultQuery = $base->prepare($query);
        $resultQuery->bindValue(':picture', $picture, PDO::PARAM_STR);
        $resultQuery->bindValue(':title', $title, PDO::PARAM_STR);
        $resultQuery->bindValue(':descr', $descr, PDO::PARAM_STR);
        $resultQuery->bindValue(':cityCode', $cityCode, PDO::PARAM_STR);
        $resultQuery->bindValue(':iframe', $iframe, PDO::PARAM_STR);
        $resultQuery->bindValue(':category', $category, PDO::PARAM_STR);
        $resultQuery->execute();
    }

    /**
     * Permet d'afficher toutes les activités
     */
    public function getAllActivities()
    {
        $base = $this->connectDb();
        $query = "SELECT `act_name` FROM pro_activities";

        $resultQuery = $base->prepare($query);
        $resultQuery->execute();
        return $resultQuery->fetchAll(PDO::FETCH_ASSOC);
    }


    /**
     * Permet d'inserer une activité de la liste d'activités dans la bdd et de la rattacher a une destiantion
     * @param string $activity : activité séléctionnée
     */
    public function addActivities($activity): void
    {
        $base = $this->connectDb();
        $query = "INSERT INTO  `pro_destination_cat`(`des_id`,`act_id`)
        values ((SELECT `des_id` FROM `pro_destination`
        ORDER BY `des_id` DESC LIMIT 1)
        ,(SELECT `act_id` FROM `pro_activities`
        WHERE `act_name` = :activity))";

        $resultQuery = $base->prepare($query);
        $resultQuery->bindValue(':activity', $activity, PDO::PARAM_STR);

        $resultQuery->execute();
    }


    /**
     * Permet d'ajouter les activités au moment de l'update
     * @param $activity : activité selectionné
     * @param $id : id de la destination (dans le GET)
     */
    public function UpdateActivities($activity, $id): void
    {
        $base = $this->connectDb();
        $query = "INSERT INTO  `pro_destination_cat`(`des_id`,`act_id`)
        values ((SELECT `des_id` FROM `pro_destination`
        WHERE des_id = :id)
        ,(SELECT `act_id` FROM `pro_activities`
        WHERE `act_name` = :activity))";

        $resultQuery = $base->prepare($query);
        $resultQuery->bindValue(':activity', $activity, PDO::PARAM_STR);
        $resultQuery->bindValue(':id', $id, PDO::PARAM_STR);

        $resultQuery->execute();
    }

    public function deleteDestinationActivities($id)
    {
        $base = $this->connectDb();
        $query = "DELETE FROM pro_destination_cat
        WHERE des_id = :id";

        $resultQuery = $base->prepare($query);
        $resultQuery->bindValue(':id', $id, PDO::PARAM_STR);

        $resultQuery->execute();
    }


    /**
     * Permet d'afficher les destinations en fonction de leur categorie dans la rubrique categories
     * @param string $id : id correspondant a la categorie
     */
    public function getDestinationDetails($id)
    {
        $base = $this->connectDb();
        $query = "SELECT * FROM `pro_destination`
        INNER JOIN `pro_categories` ON pro_categories.cat_id = pro_destination.cat_id
        WHERE pro_categories.cat_id = :id";

        $resultQuery = $base->prepare($query);
        $resultQuery->bindValue(':id', $id, PDO::PARAM_STR);
        $resultQuery->execute();
        return $resultQuery->fetchAll();
    }

    public function getDestinationTitle($title)
    {
        $base = $this->connectDb();
        $query = "SELECT `des_title` FROM `pro_destination` WHERE `des_title` = :title";

        $resultQuery = $base->prepare($query);
        $resultQuery->bindValue(':title', $title, PDO::PARAM_STR);
        $resultQuery->execute();
        return $resultQuery->fetch();
    }

    /**
     * Permet d'afficher uniquement le nom de la categorie de la categorie séléctionnée
     * @param string $id : id correspondant a la categorie
     */
    public function getCategoryTitle($id)
    {
        $base = $this->connectDb();
        $query = "SELECT * FROM `pro_categories` WHERE pro_categories.cat_id = :id";

        $resultQuery = $base->prepare($query);
        $resultQuery->bindValue(':id', $id, PDO::PARAM_STR);
        $resultQuery->execute();
        return $resultQuery->fetchAll();
    }

    /**
     * Permet d'afficher les destinations en fonction de leur categorie dans la rubrique détails
     * @param string $id : id correspondant a la destination
     */
    public function getSingleDetails($id)
    {
        $base = $this->connectDb();
        $query = "SELECT `des_id`,`des_title`,`des_description`,`des_picture`,`des_city_code`,`cat_id`,`des_visit`,`des_iframe`,group_concat(act_name) as activities
        FROM `pro_destination_cat`
        NATURAL JOIN `pro_destination`
        NATURAL JOIN `pro_activities`
        WHERE `des_id` = :id";

        $resultQuery = $base->prepare($query);
        $resultQuery->bindValue(':id', $id, PDO::PARAM_STR);
        $resultQuery->execute();
        return $resultQuery->fetchAll();
    }

    /**
     * Permet d'afficher les noms des activités selectionées par destination au moment de l'update
     * @param string $id : id de la destination
     */
    public function getActivities($id)
    {
        $base = $this->connectDb();
        $query = "SELECT group_concat(`act_name`) FROM `pro_destination`
        NATURAL JOIN `pro_destination_cat`
        NATURAL JOIN `pro_activities`
        WHERE des_id = :id";

        $resultQuery = $base->prepare($query);
        $resultQuery->bindValue(':id', $id, PDO::PARAM_STR);
        $resultQuery->execute();
        return explode(",", $resultQuery->fetchAll()[0][0]);
    }



    /**
     * Permet d'afficher les activités d'une destination
     * @param string $id : id de la destination
     */
    public function displayActivities($id)
    {
        $base = $this->connectDb();
        $query = "SELECT `act_name`,`act_icon` FROM `pro_destination`
        NATURAL JOIN `pro_destination_cat`
        NATURAL JOIN `pro_activities`
        WHERE des_id = :id";

        $resultQuery = $base->prepare($query);
        $resultQuery->bindValue(':id', $id, PDO::PARAM_STR);
        $resultQuery->execute();
        return $resultQuery->fetchAll();
    }


    /**
     * Permet d'afficher les activités d'une destination
     * @param $idAct : id de la destination
     */
    public function showActivities($idAct)
    {
        $base = $this->connectDb();
        $query = "SELECT `act_icon`,`act_name` FROM `pro_activities`
        natural join `pro_destination_cat`
        natural join `pro_destination`
        where `des_id` = :idAct";

        $resultQuery = $base->prepare($query);
        $resultQuery->bindValue(':idAct', $idAct, PDO::PARAM_STR);
        $resultQuery->execute();
        return $resultQuery->fetchAll();
    }

    /**
     * Permet d'afficher toutes les destinations avec leur catégorie
     */
    public function getDestinations()
    {
        $base = $this->connectDb();
        $query = "SELECT `des_picture`,`des_title`,`des_id`,`cat_category` FROM `pro_destination`
        INNER JOIN `pro_categories` ON pro_categories.cat_id = pro_destination.cat_id";

        $resultQuery = $base->prepare($query);
        $resultQuery->execute();
        return $resultQuery->fetchAll();
    }


    /**
     * Permet d'afficher tous les details d'une destination
     * @param string $id : id de la destination
     */
    public function getSelectedDestination($id) : array
    {
        $base = $this->connectDb();
        $query = "SELECT * FROM `pro_destination`
        INNER JOIN `pro_categories` ON pro_categories.cat_id = pro_destination.cat_id
        WHERE pro_destination.des_id = :id";

        $resultQuery = $base->prepare($query);
        $resultQuery->bindValue(':id', $id, PDO::PARAM_STR);
        $resultQuery->execute();
        return $resultQuery->fetchAll();
    }


    /**
     * Permet de mettre à jour une destination si aucune nouvelle photo n'est ajoutée
     * @param string $title : nom de la destination
     * @param string $descr : description de la destination
     * @param string $cityCode : code openweathermap pour la meteo
     * @param string $iframe : iframe de la destination
     * @param string $category : categorie de la destination
     * @param string $id : id de la destination présente dans le GET
     */
    public function updateDestinationNoPicture($title, $descr, $cityCode, $iframe, $category, $id)
    {
        $base = $this->connectDb();
        $query = "UPDATE `pro_destination`
        SET `des_title` = :title, `des_description`= :descr,`des_city_code` = :cityCode, `des_iframe` = :iframe, `cat_id` = (SELECT `cat_id` FROM `pro_categories` WHERE `cat_category` = :category) WHERE `des_id` = :id";

        $resultQuery = $base->prepare($query);
        $resultQuery->bindValue(':title', $title, PDO::PARAM_STR);
        $resultQuery->bindValue(':descr', $descr, PDO::PARAM_STR);
        $resultQuery->bindValue(':cityCode', $cityCode, PDO::PARAM_STR);
        $resultQuery->bindValue(':iframe', $iframe, PDO::PARAM_STR);
        $resultQuery->bindValue(':category', $category, PDO::PARAM_STR);
        $resultQuery->bindValue(':id', $id, PDO::PARAM_STR);

        $resultQuery->execute();
    }


    /**
     * Permet de mettre a jour une destination si une nouvelle photo est ajoutée
     * @param string $title : nom de la destination
     * @param string $descr : description de la destination
     * @param string $cityCode : code openweathermap pour la meteo
     * @param string $iframe : iframe de la destination
     * @param string $category : categorie de la destination
     * @param string $id : id de la destination présente dans le GET
     * @param string $picture : Nom de la nouvelle image
     */
    public function updateDestinationWithPicture($title, $descr, $cityCode, $iframe, $category, $id, $picture)
    {
        $base = $this->connectDb();
        $query = "UPDATE `pro_destination`
        SET `des_picture` = :picture, `des_title` = :title, `des_description`= :descr,`des_city_code` = :cityCode, `des_iframe` = :iframe, `cat_id` = (SELECT `cat_id` FROM `pro_categories` WHERE `cat_category` = :category)
        WHERE `des_id` = :id";

        $resultQuery = $base->prepare($query);
        $resultQuery->bindValue(':title', $title, PDO::PARAM_STR);
        $resultQuery->bindValue(':descr', $descr, PDO::PARAM_STR);
        $resultQuery->bindValue(':cityCode', $cityCode, PDO::PARAM_STR);
        $resultQuery->bindValue(':iframe', $iframe, PDO::PARAM_STR);
        $resultQuery->bindValue(':category', $category, PDO::PARAM_STR);
        $resultQuery->bindValue(':id', $id, PDO::PARAM_STR);
        $resultQuery->bindValue(':picture', $picture, PDO::PARAM_STR);

        $resultQuery->execute();
    }

    /**
     * Permet d'obtenir le nom de l'image pour la supprimer dans le dossier pendant l'update
     * @param string $id : id de la destination présente dans le GET
     */
    public function getPictureName($id)
    {
        $base = $this->connectDb();
        $query = "SELECT `des_picture` FROM `pro_destination` WHERE `des_id` = :id";

        $resultQuery = $base->prepare($query);
        $resultQuery->bindValue(':id', $id, PDO::PARAM_STR);
        $resultQuery->execute();
        return $resultQuery->fetchAll();
    }

    /**
     * Permet d'afficher les destinations triées par catégorie
     * @param string $category : categorie choisie pour le tri
     */
    public function getSortedDestinations($category)
    {
        $base = $this->connectDb();
        $query = "SELECT `des_picture`,`des_title`,`des_id`,`des_picture`,`cat_category` FROM `pro_destination`
        INNER JOIN `pro_categories` ON pro_categories.cat_id = pro_destination.cat_id
        WHERE `cat_category` = :category";

        $resultQuery = $base->prepare($query);
        $resultQuery->bindValue(':category', $category, PDO::PARAM_STR);
        $resultQuery->execute();
        return $resultQuery->fetchAll();
    }


    /**
     * Permet de supprimer une destination
     * @param $id : id de la destination
     */
    public function deleteDestination($id)
    {

        $base = $this->connectDb();
        $query = "DELETE FROM `pro_destination` WHERE `des_id`= :id";

        $resultQuery = $base->prepare($query);
        $resultQuery->bindValue(':id', $id, PDO::PARAM_STR);

        $resultQuery->execute();
    }

    /**
     * Permet de supprimer les activités de la table reliant les destinations aux activités associées
     * @param $id : id de la destination
     */
    public function deleteActivities($id)
    {

        $base = $this->connectDb();
        $query = "DELETE FROM `pro_destination_cat` WHERE `des_id`= :id";

        $resultQuery = $base->prepare($query);
        $resultQuery->bindValue(':id', $id, PDO::PARAM_STR);

        $resultQuery->execute();
    }

    /**
     * Permet de supprimer la destination de la wishlist d'un user si la destination est supprimée
     * @param $id : id de la destination
     */
    public function deleteWishlistDestination($id) :void
    {

        $base = $this->connectDb();
        $query = "DELETE FROM `pro_wishlist` WHERE `des_id`= :id";

        $resultQuery = $base->prepare($query);
        $resultQuery->bindValue(':id', $id, PDO::PARAM_STR);

        $resultQuery->execute();
    }

    /**
     * Permet de supprimer une destination du carnet de voyage d'un user
     * @param $id : id de la destination
     */
    public function deleteCarnet($id)
    {

        $base = $this->connectDb();
        $query = "DELETE FROM `pro_passed_trips` WHERE `des_id`= :id";

        $resultQuery = $base->prepare($query);
        $resultQuery->bindValue(':id', $id, PDO::PARAM_STR);

        $resultQuery->execute();
    }

    //*******************************PARTIE POUR LA PAGINATION*************************************

    /**
     * Permet de compter toutes les destinations
     */
    public function countDestination()
    {
        $base = $this->connectDb();
        $query = "SELECT count(*) as total FROM `pro_destination`";

        $stmt = $base->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }


    /**
     * Permet d'établir le point de départ(offset) pour les pages et d'afficher les destinations 10/page
     * @param int $offset : resultat du calcul ($pages * 10) - 10
     */
    public function getDestinationOffset(int $offset)
    {
        $base = $this->connectDb();

        $query = "SELECT * FROM `pro_destination`
        INNER JOIN `pro_categories` ON pro_categories.cat_id = pro_destination.cat_id
        LIMIT 10 OFFSET :offset";

        $stmt = $base->prepare($query);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    //***********************Fin partie pour la pagination***************************

    /**
     * Permet d'afficher le nombre de fois que la page a été visitée
     * @param string $id : id de la destination
     */
    public function getVisit($id)
    {
        $base = $this->connectDb();
        $query = "SELECT `des_visit` FROM `pro_destination`
        WHERE `des_id` = :id";
        $stmt = $base->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->execute();
        return $stmt->fetch();
    }

    /**
     * Permet d'incrementer le compteur a chaque visite/chaque fois que la page est chargée et de mettre a jour le compteur dans la bdd
     * @param string $id : id de la destination
     * @param $count : Valeur du compteur
     */
    public function incrementVisit($id, $count)
    {
        $base = $this->connectDb();
        $count++;
        $query = "UPDATE `pro_destination`
        SET `des_visit` = :increment
        WHERE `des_id` = :id";

        $stmt = $base->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':increment', $count, PDO::PARAM_INT);

        $stmt->execute();
    }


    /**
     * Permet d'afficher la premiere slide du caroussel
     */
    public function getStatFirst()
    {
        $base = $this->connectDb();

        $query = "SELECT * FROM `pro_destination`
        ORDER BY `des_visit` DESC LIMIT 1;";

        $stmt = $base->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Permet d'afficher les slides autre que la premiere du caroussel
     */
    public function getStatOther()
    {
        $base = $this->connectDb();

        $query = "SELECT * FROM `pro_destination`
        ORDER BY `des_visit` DESC LIMIT 1,2;";

        $stmt = $base->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Permet d'afficher la wishlist d'un utilisateur
     * @param string $userId : id de l'utilisateur
     */
    public function getWishlist($userId)
    {
        $base = $this->connectDb();
        $query = "SELECT * FROM `pro_destination`
        NATURAL JOIN `pro_wishlist`
        NATURAL JOIN `pro_users`
        WHERE pro_wishlist.use_id = :userId";

        $resultQuery = $base->prepare($query);
        $resultQuery->bindValue(':userId', $userId, PDO::PARAM_INT);
        $resultQuery->execute();
        return $resultQuery->fetchAll();
    }


    /**
     * Permet de rajouter a la wishlist d'un utilisateur la destination qu'il selectionne
     * @param string $destinationId : id de la destination
     * @param string $userId : id de l'utilisateur
     */
    public function addWishlist($destinationId, $userId)
    {
        $base = $this->connectDb();
        $query = "INSERT INTO  `pro_wishlist`(`des_id`,`use_id`)
        values ((SELECT `des_id` FROM `pro_destination`
        WHERE des_id = :destinationId)
        ,(SELECT `use_id` FROM `pro_users`
        WHERE `use_id` = :userId))";

        $resultQuery = $base->prepare($query);
        $resultQuery->bindValue(':destinationId', $destinationId, PDO::PARAM_INT);
        $resultQuery->bindValue(':userId', $userId, PDO::PARAM_INT);

        $resultQuery->execute();
    }


    /**
     * Permet d'afficher la wishlist d'un utilisateur
     * @param string $id : id de l'utilisateur
     */
    public function addedWishlist($id, $userId)
    {
        $base = $this->connectDb();
        $query = "SELECT * FROM `pro_wishlist` WHERE `des_id` = :id AND `use_id` = :userId";

        $stmt = $base->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);

        $stmt->execute();
        return $stmt->fetch();
    }

    /**
     * Permet de supprimer une destination de la wishlist d'un utilisateur
     * @param string $id : id de l'utilisateur
     */
    public function deleteWishlist($id)
    {

        $base = $this->connectDb();
        $query = "DELETE FROM `pro_wishlist` WHERE `des_id`= :id";

        $resultQuery = $base->prepare($query);
        $resultQuery->bindValue(':id', $id, PDO::PARAM_STR);

        $resultQuery->execute();
    }

    /**
     * Permet d'afficher le carnet de voyage d'un user
     * @param string $userId: id de l'utilisateur
     */
    public function getCarnet($userId)
    {
        $base = $this->connectDb();
        $query = "SELECT * FROM `pro_destination`
        NATURAL JOIN `pro_passed_trips`
        NATURAL JOIN `pro_users`
        WHERE pro_passed_trips.use_id = :userId";

        $resultQuery = $base->prepare($query);
        $resultQuery->bindValue(':userId', $userId, PDO::PARAM_INT);
        $resultQuery->execute();
        return $resultQuery->fetchAll();
    }

    
    /**
     * Permet de verifier si la destination est dans le carnet de l'utilisateur
     * @param string $id: id de la destination
     * @param string $id: id de l'utilisateur
     */
    public function addedCarnet($id, $userId)
    {
        $base = $this->connectDb();
        $query = "SELECT * FROM `pro_passed_trips` WHERE `des_id` = :id AND `use_id` = :userId";

        $stmt = $base->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        $stmt->bindValue(':userId', $userId, PDO::PARAM_STR);

        $stmt->execute();
        return $stmt->fetch();
    }

    /**
     * Permet d'ajouter une destination au carnet d'un utilisateur
     * @param string $destinationId: id de la destination
     * @param string $userId: id de l'utilisateur
     */
    public function addCarnet($destinationId, $userId)
    {
        $base = $this->connectDb();
        $query = "INSERT INTO  `pro_passed_trips`(`des_id`,`use_id`)
        values ((SELECT `des_id` FROM `pro_destination`
        WHERE des_id = :destinationId)
        ,(SELECT `use_id` FROM `pro_users`
        WHERE `use_id` = :userId))";

        $resultQuery = $base->prepare($query);
        $resultQuery->bindValue(':destinationId', $destinationId, PDO::PARAM_INT);
        $resultQuery->bindValue(':userId', $userId, PDO::PARAM_INT);

        $resultQuery->execute();
    }

    /**
     * Permet d'afficher le nom de l'image d'un article
     * @param string $id: id de l'article de blog
     */
    public function getBlogPictureName($id)
    {
        $base = $this->connectDb();
        $query = "SELECT `blo_picture` FROM `pro_blog` WHERE `blo_id` = :id";

        $resultQuery = $base->prepare($query);
        $resultQuery->bindValue(':id', $id, PDO::PARAM_STR);
        $resultQuery->execute();
        return $resultQuery->fetchAll();
    }

}

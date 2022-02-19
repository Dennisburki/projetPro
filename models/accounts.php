<?php


class Accounts extends DataBase
{
    /**
     * Permet de verifier si le mail existe dans la bdd
     * @param string $email : email rentré dans le champ connexion
     */
    public function checkLogin($email)
    {
        $base = $this->connectDb();
        $query = "SELECT * FROM `pro_users` WHERE `use_email` = :email";

        $stmt = $base->prepare($query);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);

        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    /**
     * Permet de verifier si le mdp existe dans la bdd
     * @param string $password : mdp rentré dans le champ connexion
     */
    public function checkPassword($email)
    {
        $base = $this->connectDb();
        $query = "SELECT `use_password` FROM `pro_users` WHERE `use_email` = :email";

        $stmt = $base->prepare($query);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);

        $stmt->execute();
        return $stmt->fetch();
    }


    /**
     * Permet de recuperer les valeurs de users sauf le mdp
     */
    public function getUserConnect($email)
    {
        $base = $this->connectDb();
        $query = "SELECT use_id as 'id',use_email as 'login',rol_id as 'role', use_first_name as 'name' FROM `pro_users` WHERE `use_email` = :email";

        $stmt = $base->prepare($query);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);

        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    /**
     * Permet d'inserer un user dans la bdd quand il s'inscrit
     * @param $name : prenom du l'utilisateur
     * @param $email : email de l'utilisateur
     * @param $password : mdp de l'utilisateur
     */
    public function addUser($name, $email, $password)
    {
        $base = $this->connectDb();
        $query = "INSERT INTO pro_users(use_first_name,use_email,use_password,rol_id)
        VALUES (:prenom,:email,:passwordUser,'2')";

        $stmt = $base->prepare($query);
        $stmt->bindValue(':prenom', $name, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':passwordUser', $password, PDO::PARAM_STR);

        $stmt->execute();
    }


    /**
     * Permet d'inserer les publications du blog dans la bdd, s'il y a une photo
     * @param string $title : titre de l'article
     * @param string $content : contenu de l'article
     * @param string $pictureName : Nom de l'image
     * @param string $id :id de l'utilisateur qui a rédigé l'article, présent dans SESSION
     */
    public function addPost($title, $content, $pictureName, $id)
    {
        $base = $this->connectDb();
        $query = "INSERT INTO `pro_blog`(`blo_title`,`blo_content`,`blo_picture`,`blo_moderation`,`use_id`)
        VALUES (:title,:content,:pictureName,0,(SELECT `use_id` FROM `pro_users` WHERE `use_id` = :id));";

        $stmt = $base->prepare($query);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':content', $content, PDO::PARAM_STR);
        $stmt->bindValue(':pictureName', $pictureName, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);

        $stmt->execute();
    }


    /**
     * Permet d'inserer les publications du blog dans la bdd, s'il n'y a pas de photos
     * @param string $title : titre de l'article
     * @param string $content : contenu de l'article
     * @param string $id :id de l'utilisateur qui a rédigé l'article, présent dans SESSION
     */
    public function addPostWithoutPicture($title, $content, $id)
    {
        $base = $this->connectDb();
        $query = "INSERT INTO `pro_blog`(`blo_title`,`blo_content`,`blo_moderation`,`use_id`)
        VALUES (:title,:content,0,(SELECT `use_id` FROM `pro_users` WHERE `use_id` = :id));";

        $stmt = $base->prepare($query);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':content', $content, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);

        $stmt->execute();
    }

    /**
     * Permet d'afficher les publications du blog en attente de moderation
     */
    public function getPost()
    {
        $base = $this->connectDB();
        $query = "SELECT * FROM `pro_blog`
        INNER JOIN `pro_users` ON pro_users.use_id = pro_blog.use_id
        WHERE `blo_moderation` = 0";

        $stmt = $base->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Permet d'afficher les publications du blog validées
     */
    public function getApprouvedPost()
    {
        $base = $this->connectDB();
        $query = "SELECT * FROM `pro_blog`
        INNER JOIN `pro_users` ON pro_users.use_id = pro_blog.use_id
        WHERE `blo_moderation` = 1";

        $stmt = $base->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function switchModeration($id)
    {
        $base = $this->connectDb();
        $query = "UPDATE `pro_blog`
        SET `blo_moderation` = 1
        WHERE `blo_id` = :id";

        $stmt = $base->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function deletePost($id)
    {
        $base = $this->connectDb();
        $query = "DELETE FROM `pro_blog`
        WHERE `blo_id` = :id";

        $stmt = $base->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
    }

    /**
     * Permet d'afficher les publications du blog validées
     */
    public function getApprouvedPostById($id)
    {
        $base = $this->connectDB();
        $query = "SELECT * FROM `pro_blog`
        INNER JOIN `pro_users` ON pro_users.use_id = pro_blog.use_id
        WHERE blo_id = :id";

        $stmt = $base->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}

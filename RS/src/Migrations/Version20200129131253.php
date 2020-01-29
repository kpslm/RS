<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200129131253 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE actu (id INT AUTO_INCREMENT NOT NULL, likes_id INT DEFAULT NULL, date DATETIME NOT NULL, category VARCHAR(255) NOT NULL, text VARCHAR(255) DEFAULT NULL, picture VARCHAR(255) NOT NULL, nb_like INT NOT NULL, INDEX IDX_837303422F23775F (likes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, id_publication_id INT DEFAULT NULL, id_picture_id INT DEFAULT NULL, actu_id INT DEFAULT NULL, likes_id INT DEFAULT NULL, text VARCHAR(255) NOT NULL, date DATETIME NOT NULL, nb_like INT NOT NULL, INDEX IDX_67F068BC79F37AE5 (id_user_id), INDEX IDX_67F068BC5D4AAA1 (id_publication_id), INDEX IDX_67F068BC4BCF3D68 (id_picture_id), INDEX IDX_67F068BCF77EEF58 (actu_id), INDEX IDX_67F068BC2F23775F (likes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `like` (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, id_user_reception_id INT DEFAULT NULL, message VARCHAR(255) NOT NULL, date DATETIME NOT NULL, picture VARCHAR(255) DEFAULT NULL, document VARCHAR(255) DEFAULT NULL, lu TINYINT(1) NOT NULL, INDEX IDX_B6BD307F79F37AE5 (id_user_id), INDEX IDX_B6BD307FDEFCB47 (id_user_reception_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE picture (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, likes_id INT DEFAULT NULL, date DATETIME NOT NULL, description VARCHAR(255) NOT NULL, nb_like INT NOT NULL, INDEX IDX_16DB4F8979F37AE5 (id_user_id), INDEX IDX_16DB4F892F23775F (likes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE publication (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, likes_id INT DEFAULT NULL, text VARCHAR(255) NOT NULL, date DATETIME NOT NULL, nb_like INT NOT NULL, INDEX IDX_AF3C677979F37AE5 (id_user_id), INDEX IDX_AF3C67792F23775F (likes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, likes_id INT DEFAULT NULL, firstname VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, age INT NOT NULL, phone VARCHAR(12) NOT NULL, email VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, cdp VARCHAR(5) NOT NULL, picture VARCHAR(255) NOT NULL, background VARCHAR(255) NOT NULL, bio VARCHAR(255) DEFAULT NULL, at_created DATE NOT NULL, is_activate TINYINT(1) NOT NULL, password INT NOT NULL, compte_entreprise TINYINT(1) NOT NULL, INDEX IDX_8D93D6492F23775F (likes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE actu ADD CONSTRAINT FK_837303422F23775F FOREIGN KEY (likes_id) REFERENCES `like` (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC5D4AAA1 FOREIGN KEY (id_publication_id) REFERENCES publication (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC4BCF3D68 FOREIGN KEY (id_picture_id) REFERENCES picture (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCF77EEF58 FOREIGN KEY (actu_id) REFERENCES actu (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC2F23775F FOREIGN KEY (likes_id) REFERENCES `like` (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FDEFCB47 FOREIGN KEY (id_user_reception_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F8979F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F892F23775F FOREIGN KEY (likes_id) REFERENCES `like` (id)');
        $this->addSql('ALTER TABLE publication ADD CONSTRAINT FK_AF3C677979F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE publication ADD CONSTRAINT FK_AF3C67792F23775F FOREIGN KEY (likes_id) REFERENCES `like` (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6492F23775F FOREIGN KEY (likes_id) REFERENCES `like` (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCF77EEF58');
        $this->addSql('ALTER TABLE actu DROP FOREIGN KEY FK_837303422F23775F');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC2F23775F');
        $this->addSql('ALTER TABLE picture DROP FOREIGN KEY FK_16DB4F892F23775F');
        $this->addSql('ALTER TABLE publication DROP FOREIGN KEY FK_AF3C67792F23775F');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6492F23775F');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC4BCF3D68');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC5D4AAA1');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC79F37AE5');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F79F37AE5');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FDEFCB47');
        $this->addSql('ALTER TABLE picture DROP FOREIGN KEY FK_16DB4F8979F37AE5');
        $this->addSql('ALTER TABLE publication DROP FOREIGN KEY FK_AF3C677979F37AE5');
        $this->addSql('DROP TABLE actu');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE `like`');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE picture');
        $this->addSql('DROP TABLE publication');
        $this->addSql('DROP TABLE user');
    }
}

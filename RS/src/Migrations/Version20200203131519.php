<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200203131519 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE actu DROP FOREIGN KEY FK_837303422F23775F');
        $this->addSql('DROP INDEX IDX_837303422F23775F ON actu');
        $this->addSql('ALTER TABLE actu DROP likes_id');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC2F23775F');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC4BCF3D68');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC79F37AE5');
        $this->addSql('DROP INDEX IDX_67F068BC2F23775F ON commentaire');
        $this->addSql('DROP INDEX IDX_67F068BC79F37AE5 ON commentaire');
        $this->addSql('DROP INDEX IDX_67F068BC4BCF3D68 ON commentaire');
        $this->addSql('ALTER TABLE commentaire ADD user_id INT DEFAULT NULL, ADD picture_id INT DEFAULT NULL, DROP id_user_id, DROP id_picture_id, DROP likes_id');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCEE45BDBF FOREIGN KEY (picture_id) REFERENCES picture (id)');
        $this->addSql('CREATE INDEX IDX_67F068BCA76ED395 ON commentaire (user_id)');
        $this->addSql('CREATE INDEX IDX_67F068BCEE45BDBF ON commentaire (picture_id)');
        $this->addSql('ALTER TABLE `like` ADD user_id INT DEFAULT NULL, ADD actu_id INT DEFAULT NULL, ADD commentaire_id INT DEFAULT NULL, ADD publication_id INT DEFAULT NULL, ADD picture_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `like` ADD CONSTRAINT FK_AC6340B3A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE `like` ADD CONSTRAINT FK_AC6340B3F77EEF58 FOREIGN KEY (actu_id) REFERENCES actu (id)');
        $this->addSql('ALTER TABLE `like` ADD CONSTRAINT FK_AC6340B3BA9CD190 FOREIGN KEY (commentaire_id) REFERENCES commentaire (id)');
        $this->addSql('ALTER TABLE `like` ADD CONSTRAINT FK_AC6340B338B217A7 FOREIGN KEY (publication_id) REFERENCES publication (id)');
        $this->addSql('ALTER TABLE `like` ADD CONSTRAINT FK_AC6340B3EE45BDBF FOREIGN KEY (picture_id) REFERENCES picture (id)');
        $this->addSql('CREATE INDEX IDX_AC6340B3A76ED395 ON `like` (user_id)');
        $this->addSql('CREATE INDEX IDX_AC6340B3F77EEF58 ON `like` (actu_id)');
        $this->addSql('CREATE INDEX IDX_AC6340B3BA9CD190 ON `like` (commentaire_id)');
        $this->addSql('CREATE INDEX IDX_AC6340B338B217A7 ON `like` (publication_id)');
        $this->addSql('CREATE INDEX IDX_AC6340B3EE45BDBF ON `like` (picture_id)');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F79F37AE5');
        $this->addSql('DROP INDEX IDX_B6BD307F79F37AE5 ON message');
        $this->addSql('ALTER TABLE message CHANGE id_user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_B6BD307FA76ED395 ON message (user_id)');
        $this->addSql('ALTER TABLE picture DROP FOREIGN KEY FK_16DB4F892F23775F');
        $this->addSql('ALTER TABLE picture DROP FOREIGN KEY FK_16DB4F8979F37AE5');
        $this->addSql('DROP INDEX IDX_16DB4F892F23775F ON picture');
        $this->addSql('DROP INDEX IDX_16DB4F8979F37AE5 ON picture');
        $this->addSql('ALTER TABLE picture ADD user_id INT DEFAULT NULL, DROP id_user_id, DROP likes_id');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F89A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_16DB4F89A76ED395 ON picture (user_id)');
        $this->addSql('ALTER TABLE publication DROP FOREIGN KEY FK_AF3C67792F23775F');
        $this->addSql('ALTER TABLE publication DROP FOREIGN KEY FK_AF3C677979F37AE5');
        $this->addSql('DROP INDEX IDX_AF3C67792F23775F ON publication');
        $this->addSql('DROP INDEX IDX_AF3C677979F37AE5 ON publication');
        $this->addSql('ALTER TABLE publication ADD user_id INT DEFAULT NULL, DROP id_user_id, DROP likes_id');
        $this->addSql('ALTER TABLE publication ADD CONSTRAINT FK_AF3C6779A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_AF3C6779A76ED395 ON publication (user_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6492F23775F');
        $this->addSql('DROP INDEX IDX_8D93D6492F23775F ON user');
        $this->addSql('ALTER TABLE user ADD roles JSON NOT NULL, ADD ville VARCHAR(60) DEFAULT NULL, ADD nom VARCHAR(255) NOT NULL, DROP likes_id, DROP firstname, DROP city, DROP compte_entreprise, CHANGE username username VARCHAR(100) NOT NULL, CHANGE age age INT NOT NULL, CHANGE email email VARCHAR(180) NOT NULL, CHANGE cdp cdp VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE actu ADD likes_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE actu ADD CONSTRAINT FK_837303422F23775F FOREIGN KEY (likes_id) REFERENCES `like` (id)');
        $this->addSql('CREATE INDEX IDX_837303422F23775F ON actu (likes_id)');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCA76ED395');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCEE45BDBF');
        $this->addSql('DROP INDEX IDX_67F068BCA76ED395 ON commentaire');
        $this->addSql('DROP INDEX IDX_67F068BCEE45BDBF ON commentaire');
        $this->addSql('ALTER TABLE commentaire ADD id_user_id INT DEFAULT NULL, ADD id_picture_id INT DEFAULT NULL, ADD likes_id INT DEFAULT NULL, DROP user_id, DROP picture_id');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC2F23775F FOREIGN KEY (likes_id) REFERENCES `like` (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC4BCF3D68 FOREIGN KEY (id_picture_id) REFERENCES picture (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_67F068BC2F23775F ON commentaire (likes_id)');
        $this->addSql('CREATE INDEX IDX_67F068BC79F37AE5 ON commentaire (id_user_id)');
        $this->addSql('CREATE INDEX IDX_67F068BC4BCF3D68 ON commentaire (id_picture_id)');
        $this->addSql('ALTER TABLE `like` DROP FOREIGN KEY FK_AC6340B3A76ED395');
        $this->addSql('ALTER TABLE `like` DROP FOREIGN KEY FK_AC6340B3F77EEF58');
        $this->addSql('ALTER TABLE `like` DROP FOREIGN KEY FK_AC6340B3BA9CD190');
        $this->addSql('ALTER TABLE `like` DROP FOREIGN KEY FK_AC6340B338B217A7');
        $this->addSql('ALTER TABLE `like` DROP FOREIGN KEY FK_AC6340B3EE45BDBF');
        $this->addSql('DROP INDEX IDX_AC6340B3A76ED395 ON `like`');
        $this->addSql('DROP INDEX IDX_AC6340B3F77EEF58 ON `like`');
        $this->addSql('DROP INDEX IDX_AC6340B3BA9CD190 ON `like`');
        $this->addSql('DROP INDEX IDX_AC6340B338B217A7 ON `like`');
        $this->addSql('DROP INDEX IDX_AC6340B3EE45BDBF ON `like`');
        $this->addSql('ALTER TABLE `like` DROP user_id, DROP actu_id, DROP commentaire_id, DROP publication_id, DROP picture_id');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FA76ED395');
        $this->addSql('DROP INDEX IDX_B6BD307FA76ED395 ON message');
        $this->addSql('ALTER TABLE message CHANGE user_id id_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_B6BD307F79F37AE5 ON message (id_user_id)');
        $this->addSql('ALTER TABLE picture DROP FOREIGN KEY FK_16DB4F89A76ED395');
        $this->addSql('DROP INDEX IDX_16DB4F89A76ED395 ON picture');
        $this->addSql('ALTER TABLE picture ADD likes_id INT DEFAULT NULL, CHANGE user_id id_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F892F23775F FOREIGN KEY (likes_id) REFERENCES `like` (id)');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F8979F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_16DB4F892F23775F ON picture (likes_id)');
        $this->addSql('CREATE INDEX IDX_16DB4F8979F37AE5 ON picture (id_user_id)');
        $this->addSql('ALTER TABLE publication DROP FOREIGN KEY FK_AF3C6779A76ED395');
        $this->addSql('DROP INDEX IDX_AF3C6779A76ED395 ON publication');
        $this->addSql('ALTER TABLE publication ADD likes_id INT DEFAULT NULL, CHANGE user_id id_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE publication ADD CONSTRAINT FK_AF3C67792F23775F FOREIGN KEY (likes_id) REFERENCES `like` (id)');
        $this->addSql('ALTER TABLE publication ADD CONSTRAINT FK_AF3C677979F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_AF3C67792F23775F ON publication (likes_id)');
        $this->addSql('CREATE INDEX IDX_AF3C677979F37AE5 ON publication (id_user_id)');
        $this->addSql('DROP INDEX UNIQ_8D93D649E7927C74 ON user');
        $this->addSql('ALTER TABLE user ADD likes_id INT DEFAULT NULL, ADD city VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD compte_entreprise TINYINT(1) NOT NULL, DROP roles, DROP ville, CHANGE email email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE username username VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE age age DATE NOT NULL, CHANGE cdp cdp VARCHAR(5) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nom firstname VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6492F23775F FOREIGN KEY (likes_id) REFERENCES `like` (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6492F23775F ON user (likes_id)');
    }
}

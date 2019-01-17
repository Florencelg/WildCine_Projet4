<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190116165513 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE movie (id INT AUTO_INCREMENT NOT NULL, directors_id INT DEFAULT NULL, synopsis VARCHAR(255) NOT NULL, picture VARCHAR(255) NOT NULL, year VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, INDEX IDX_1D5EF26F4329E6FB (directors_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movie_artist (movie_id INT NOT NULL, artist_id INT NOT NULL, INDEX IDX_F89E0BF28F93B6FC (movie_id), INDEX IDX_F89E0BF2B7970CF8 (artist_id), PRIMARY KEY(movie_id, artist_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movie_genre (movie_id INT NOT NULL, genre_id INT NOT NULL, INDEX IDX_FD1229648F93B6FC (movie_id), INDEX IDX_FD1229644296D31F (genre_id), PRIMARY KEY(movie_id, genre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE director (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, birth_date VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE artist (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, birth_date VARCHAR(255) NOT NULL, biography VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE artist_director (artist_id INT NOT NULL, director_id INT NOT NULL, INDEX IDX_A69A39A1B7970CF8 (artist_id), INDEX IDX_A69A39A1899FB366 (director_id), PRIMARY KEY(artist_id, director_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genre (id INT AUTO_INCREMENT NOT NULL, drama VARCHAR(255) NOT NULL, comedy VARCHAR(255) NOT NULL, triller VARCHAR(255) NOT NULL, action VARCHAR(255) NOT NULL, fantastic VARCHAR(255) NOT NULL, horror VARCHAR(255) NOT NULL, romantic VARCHAR(255) NOT NULL, adventure VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE serie (id INT AUTO_INCREMENT NOT NULL, directors_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, synopsis VARCHAR(255) NOT NULL, picture VARCHAR(255) NOT NULL, year VARCHAR(255) NOT NULL, INDEX IDX_AA3A93344329E6FB (directors_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE serie_artist (serie_id INT NOT NULL, artist_id INT NOT NULL, INDEX IDX_F6F3CDEED94388BD (serie_id), INDEX IDX_F6F3CDEEB7970CF8 (artist_id), PRIMARY KEY(serie_id, artist_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE serie_genre (serie_id INT NOT NULL, genre_id INT NOT NULL, INDEX IDX_4B5C076CD94388BD (serie_id), INDEX IDX_4B5C076C4296D31F (genre_id), PRIMARY KEY(serie_id, genre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE movie ADD CONSTRAINT FK_1D5EF26F4329E6FB FOREIGN KEY (directors_id) REFERENCES director (id)');
        $this->addSql('ALTER TABLE movie_artist ADD CONSTRAINT FK_F89E0BF28F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE movie_artist ADD CONSTRAINT FK_F89E0BF2B7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE movie_genre ADD CONSTRAINT FK_FD1229648F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE movie_genre ADD CONSTRAINT FK_FD1229644296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artist_director ADD CONSTRAINT FK_A69A39A1B7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artist_director ADD CONSTRAINT FK_A69A39A1899FB366 FOREIGN KEY (director_id) REFERENCES director (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE serie ADD CONSTRAINT FK_AA3A93344329E6FB FOREIGN KEY (directors_id) REFERENCES director (id)');
        $this->addSql('ALTER TABLE serie_artist ADD CONSTRAINT FK_F6F3CDEED94388BD FOREIGN KEY (serie_id) REFERENCES serie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE serie_artist ADD CONSTRAINT FK_F6F3CDEEB7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE serie_genre ADD CONSTRAINT FK_4B5C076CD94388BD FOREIGN KEY (serie_id) REFERENCES serie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE serie_genre ADD CONSTRAINT FK_4B5C076C4296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE movie_artist DROP FOREIGN KEY FK_F89E0BF28F93B6FC');
        $this->addSql('ALTER TABLE movie_genre DROP FOREIGN KEY FK_FD1229648F93B6FC');
        $this->addSql('ALTER TABLE movie DROP FOREIGN KEY FK_1D5EF26F4329E6FB');
        $this->addSql('ALTER TABLE artist_director DROP FOREIGN KEY FK_A69A39A1899FB366');
        $this->addSql('ALTER TABLE serie DROP FOREIGN KEY FK_AA3A93344329E6FB');
        $this->addSql('ALTER TABLE movie_artist DROP FOREIGN KEY FK_F89E0BF2B7970CF8');
        $this->addSql('ALTER TABLE artist_director DROP FOREIGN KEY FK_A69A39A1B7970CF8');
        $this->addSql('ALTER TABLE serie_artist DROP FOREIGN KEY FK_F6F3CDEEB7970CF8');
        $this->addSql('ALTER TABLE movie_genre DROP FOREIGN KEY FK_FD1229644296D31F');
        $this->addSql('ALTER TABLE serie_genre DROP FOREIGN KEY FK_4B5C076C4296D31F');
        $this->addSql('ALTER TABLE serie_artist DROP FOREIGN KEY FK_F6F3CDEED94388BD');
        $this->addSql('ALTER TABLE serie_genre DROP FOREIGN KEY FK_4B5C076CD94388BD');
        $this->addSql('DROP TABLE movie');
        $this->addSql('DROP TABLE movie_artist');
        $this->addSql('DROP TABLE movie_genre');
        $this->addSql('DROP TABLE director');
        $this->addSql('DROP TABLE artist');
        $this->addSql('DROP TABLE artist_director');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE serie');
        $this->addSql('DROP TABLE serie_artist');
        $this->addSql('DROP TABLE serie_genre');
    }
}

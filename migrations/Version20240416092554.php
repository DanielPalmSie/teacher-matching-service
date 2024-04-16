<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240416092554 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE group_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE skill_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE students_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE teacher_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE "group" (id INT NOT NULL, min_size INT NOT NULL, max_size INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE group_memberships (group_id INT NOT NULL, student_id INT NOT NULL, PRIMARY KEY(group_id, student_id))');
        $this->addSql('CREATE INDEX IDX_A3E258B7FE54D947 ON group_memberships (group_id)');
        $this->addSql('CREATE INDEX IDX_A3E258B7CB944F1A ON group_memberships (student_id)');
        $this->addSql('CREATE TABLE group_teachers (group_id INT NOT NULL, teacher_id INT NOT NULL, PRIMARY KEY(group_id, teacher_id))');
        $this->addSql('CREATE INDEX IDX_E4375389FE54D947 ON group_teachers (group_id)');
        $this->addSql('CREATE INDEX IDX_E437538941807E1D ON group_teachers (teacher_id)');
        $this->addSql('CREATE TABLE skill (id INT NOT NULL, skill_name VARCHAR(255) NOT NULL, skill_category VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE student_skills (student_id INT NOT NULL, skill_id INT NOT NULL, desired_level VARCHAR(255) NOT NULL, PRIMARY KEY(student_id, skill_id))');
        $this->addSql('CREATE INDEX IDX_5B07CEF0CB944F1A ON student_skills (student_id)');
        $this->addSql('CREATE INDEX IDX_5B07CEF05585C142 ON student_skills (skill_id)');
        $this->addSql('CREATE TABLE students (id INT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A4698DB2E7927C74 ON students (email)');
        $this->addSql('CREATE TABLE teacher (id INT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, max_groups INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B0F6A6D5E7927C74 ON teacher (email)');
        $this->addSql('CREATE TABLE teacher_skills (teacher_id INT NOT NULL, skill_id INT NOT NULL, proficiency_level VARCHAR(255) NOT NULL, PRIMARY KEY(teacher_id, skill_id))');
        $this->addSql('CREATE INDEX IDX_C0BAC48541807E1D ON teacher_skills (teacher_id)');
        $this->addSql('CREATE INDEX IDX_C0BAC4855585C142 ON teacher_skills (skill_id)');
        $this->addSql('ALTER TABLE group_memberships ADD CONSTRAINT FK_A3E258B7FE54D947 FOREIGN KEY (group_id) REFERENCES "group" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE group_memberships ADD CONSTRAINT FK_A3E258B7CB944F1A FOREIGN KEY (student_id) REFERENCES students (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE group_teachers ADD CONSTRAINT FK_E4375389FE54D947 FOREIGN KEY (group_id) REFERENCES "group" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE group_teachers ADD CONSTRAINT FK_E437538941807E1D FOREIGN KEY (teacher_id) REFERENCES teacher (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE student_skills ADD CONSTRAINT FK_5B07CEF0CB944F1A FOREIGN KEY (student_id) REFERENCES students (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE student_skills ADD CONSTRAINT FK_5B07CEF05585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE teacher_skills ADD CONSTRAINT FK_C0BAC48541807E1D FOREIGN KEY (teacher_id) REFERENCES teacher (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE teacher_skills ADD CONSTRAINT FK_C0BAC4855585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE group_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE skill_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE students_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE teacher_id_seq CASCADE');
        $this->addSql('ALTER TABLE group_memberships DROP CONSTRAINT FK_A3E258B7FE54D947');
        $this->addSql('ALTER TABLE group_memberships DROP CONSTRAINT FK_A3E258B7CB944F1A');
        $this->addSql('ALTER TABLE group_teachers DROP CONSTRAINT FK_E4375389FE54D947');
        $this->addSql('ALTER TABLE group_teachers DROP CONSTRAINT FK_E437538941807E1D');
        $this->addSql('ALTER TABLE student_skills DROP CONSTRAINT FK_5B07CEF0CB944F1A');
        $this->addSql('ALTER TABLE student_skills DROP CONSTRAINT FK_5B07CEF05585C142');
        $this->addSql('ALTER TABLE teacher_skills DROP CONSTRAINT FK_C0BAC48541807E1D');
        $this->addSql('ALTER TABLE teacher_skills DROP CONSTRAINT FK_C0BAC4855585C142');
        $this->addSql('DROP TABLE "group"');
        $this->addSql('DROP TABLE group_memberships');
        $this->addSql('DROP TABLE group_teachers');
        $this->addSql('DROP TABLE skill');
        $this->addSql('DROP TABLE student_skills');
        $this->addSql('DROP TABLE students');
        $this->addSql('DROP TABLE teacher');
        $this->addSql('DROP TABLE teacher_skills');
    }
}

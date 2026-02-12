<?php


namespace App\Repository;

use App\Entity\Etudiant;

final class FakeEtudiantRepository implements RepositoryInterface
{
    private array $data = [];
    private int $autoIncrement = 1;

    public function findAll(): array
    {
        return array_values($this->data);
    }

    public function findById(int $id)
    {
        return $this->data[$id] ?? null;
    }

    public function save($entity): void
    {
        if (!$entity instanceof Etudiant) {
            throw new \InvalidArgumentException("Type non supporté.");
        }

        if ($entity->getId() === null) {
            $entity->setId($this->autoIncrement);
            $this->data[$this->autoIncrement] = $entity;
            $this->autoIncrement++;
        } else {
            $this->data[$entity->getId()] = $entity;
        }
    }

    public function delete(int $id): void
    {
        unset($this->data[$id]);
    }
}
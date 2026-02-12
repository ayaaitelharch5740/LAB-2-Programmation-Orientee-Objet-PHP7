<?php


namespace App\Repository;

interface RepositoryInterface
{
    public function findAll(): array;
    public function findById(int $id);
    public function save($entity): void;
    public function delete(int $id): void;
}
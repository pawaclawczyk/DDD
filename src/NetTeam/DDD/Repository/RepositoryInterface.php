<?php

namespace NetTeam\DDD\Repository;

/**
 * Interfejs dla repozytoriów
 */
interface RepositoryInterface
{

    /**
     * Wyszykanie encji za pomoca klucza w repozytorium
     *
     * @param  mixed  $id
     * @return object
     */
    public function find($id);

    /**
     * Wyszykanie wszystkich encji w repozytorium
     *
     * @return object
     */
    public function findAll();

    /**
     * Utrwalenie zmian encji w repozytorium
     *
     * @param mixed $entity
     */
    public function persist($entity);

    /**
     * Usunięcie encji z repozytorium
     *
     * @param mixed $entity
     */
    public function remove($entity);
}
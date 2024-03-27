<?php

namespace HenriqueBS0\AgendaTarefas\Estrutura\Model;

interface IDataService {
    public static function get(IEntity $entity) : IEntity|null;
    
    public static function getAll(IEntity $entity) : array;

    public static function set(IEntity $entity) : void;
    public static function add(IEntity $entity) : void;

    public static function remove(IEntity $entity) : void;
}
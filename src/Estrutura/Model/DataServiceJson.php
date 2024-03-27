<?php

namespace HenriqueBS0\AgendaTarefas\Estrutura\Model;

class DataServiceJson implements IDataService {
    
    public static function get(IEntity $entity) : IEntity|null
    {
        if(!isset(self::getData()[$entity->getTypeName()][$entity->getId()])) {
            return null;
        }

        $entity->setData(self::getData()[$entity->getTypeName()][$entity->getId()]);

        return $entity;
    }
    
    public static function getAll(IEntity $entity) : array
    {
        if(!isset(self::getData()[$entity->getTypeName()])) {
            return [];
        }

        return array_map(function($data) use($entity) {
            $new = clone $entity;
            $new->setData($data);
            return $new;
        }, self::getData()[$entity->getTypeName()]);
    }

    public static function set(IEntity $entity) : void
    {
        if(!isset(self::getData()[$entity->getTypeName()][$entity->getId()])) {
            return;
        }

        $data = self::getData();

        $data[$entity->getTypeName()][$entity->getId()] = $entity->getData();

        self::setData($data);
    }

    public static function add(IEntity $entity) : void
    {
        if(isset(self::getData()[$entity->getTypeName()][$entity->getId()])) {
            return;
        }

        $data = self::getData();

        $data[$entity->getTypeName()][$entity->getId()] = $entity->getData();

        self::setData($data);
    }

    public static function remove(IEntity $entity) : void
    {
        if(!isset(self::getData()[$entity->getTypeName()][$entity->getId()])) {
            return;
        }

        $data = self::getData();

        unset($data[$entity->getTypeName()][$entity->getId()]);

        self::setData($data);
    }

    private static function getData() : array
    {
        return json_decode(file_get_contents(JSON_PATH), true);
    }

    private static function setData(array $data) : void
    {
        file_put_contents(JSON_PATH, json_encode($data));
    }
}
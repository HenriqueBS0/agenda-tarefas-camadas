<?php

namespace HenriqueBS0\AgendaTarefas\Estrutura\Model;

interface IEntity {
    public function getId();
    public function getData();
    public function setData($data);
    public function getTypeName();
}
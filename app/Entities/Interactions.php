<?php

namespace App\Entities;


class Interactions
{

    /**
     * @var mixed
     */
    protected $Subject;

    /**
     * @var mixed
     */
    protected $Message;

    /**
     * @var mixed
     */
    protected $DateCreate;

    /**
     * @var mixed
     */
    protected $Sender;

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->Subject;
    }

    /**
     * @param mixed $Subject
     * @return Interactions
     */
    public function setSubject($Subject)
    {
        $this->Subject = $Subject;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->Message;
    }

    /**
     * @param mixed $Message
     * @return Interactions
     */
    public function setMessage($Message)
    {
        $this->Message = $Message;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateCreate()
    {
        return $this->DateCreate;
    }

    /**
     * @param mixed $DateCreate
     * @return Interactions
     */
    public function setDateCreate($DateCreate)
    {
        $this->DateCreate = $DateCreate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSender()
    {
        return $this->Sender;
    }

    /**
     * @param mixed $Sender
     * @return Interactions
     */
    public function setSender($Sender)
    {
        $this->Sender = $Sender;
        return $this;
    }

}

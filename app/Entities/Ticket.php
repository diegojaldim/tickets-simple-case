<?php

namespace App\Entities;


class Ticket
{

    /**
     * @var mixed
     */
    protected $TicketID;

    /**
     * @var mixed
     */
    protected $CategoryID;

    /**
     * @var mixed
     */
    protected $CustomerID;

    /**
     * @var mixed
     */
    protected $CustomerName;

    /**
     * @var mixed
     */
    protected $CustomerEmail;

    /**
     * @var mixed
     */
    protected $DateCreate;

    /**
     * @var mixed
     */
    protected $DateUpdate;

    /**
     * @var mixed
     */
    protected $Interactions;

    /**
     * @return mixed
     */
    public function getTicketID()
    {
        return $this->TicketID;
    }

    /**
     * @param mixed $TicketID
     * @return Ticket
     */
    public function setTicketID($TicketID)
    {
        $this->TicketID = $TicketID;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCategoryID()
    {
        return $this->CategoryID;
    }

    /**
     * @param mixed $CategoryID
     * @return Ticket
     */
    public function setCategoryID($CategoryID)
    {
        $this->CategoryID = $CategoryID;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCustomerID()
    {
        return $this->CustomerID;
    }

    /**
     * @param mixed $CustomerID
     * @return Ticket
     */
    public function setCustomerID($CustomerID)
    {
        $this->CustomerID = $CustomerID;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCustomerName()
    {
        return $this->CustomerName;
    }

    /**
     * @param mixed $CustomerName
     * @return Ticket
     */
    public function setCustomerName($CustomerName)
    {
        $this->CustomerName = $CustomerName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCustomerEmail()
    {
        return $this->CustomerEmail;
    }

    /**
     * @param mixed $CustomerEmail
     * @return Ticket
     */
    public function setCustomerEmail($CustomerEmail)
    {
        $this->CustomerEmail = $CustomerEmail;
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
     * @return Ticket
     */
    public function setDateCreate($DateCreate)
    {
        $this->DateCreate = $DateCreate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateUpdate()
    {
        return $this->DateUpdate;
    }

    /**
     * @param mixed $DateUpdate
     * @return Ticket
     */
    public function setDateUpdate($DateUpdate)
    {
        $this->DateUpdate = $DateUpdate;
        return $this;
    }

    /**
     * @return InteractionsCollection
     */
    public function getInteractions(): InteractionsCollection
    {
        return $this->Interactions;
    }

    /**
     * @param mixed $Interactions
     * @return Ticket
     */
    public function setInteractions(InteractionsCollection $Interactions)
    {
        $this->Interactions = $Interactions;
        return $this;
    }

}

<?php
/**
 * Created by PhpStorm.
 * User: kaleb
 * Date: 15/11/18
 * Time: 12:49
 */
namespace Api;
use Models\OrderItems;

/**
 * Sumarizações de dados transacionais de pedidos.
 */
class Pmweb_Orders_Stats
{
    private $startDate;
    private $endtDate;

    /**
     * @var OrderItems $orderList
     */
    private $orderList;
    public function __construct()
    {
        $this->orderList = new OrderItems();
    }

    /**
     * Define o período inicial da consulta.
     * @param String $date Data de início, formato `Y-m-d` (ex, 2017-08-24).
     *
     * @return void
     */
    public function setStartDate($date) {
        $this->startDate = $date;

    }

    /**
     * Define o período final da consulta.
     *
     * @param String $date Data final da consulta, formato `Y-m-d` (ex, 2017-08-24).
     *
     * @return void
     */
    public function setEndDate($date) {
        $this->endtDate = $date;
    }

    /**
     * Retorna o total de pedidos efetuados no período.
     *
     * @return integer Total de pedidos.
     */
    public function getOrdersCount() {
       return $this->getQueryWithDateFilter()->count();
    }

    /**
     * Retorna a receita total de pedidos efetuados no período.
     *
     * @return float Receita total no período.
     */
    public function getOrdersRevenue() {
        return number_format((float)$this->getQueryWithDateFilter()->sum('price'),2,'.','');
    }

    /**
     * Retorna o total de produtos vendidos no período (soma de quantidades).
     *
     * @return integer Total de produtos vendidos.
     */
    public function getOrdersQuantity() {
        return $this->getQueryWithDateFilter()->get()->sum('quantity');
    }

    /**
     * Retorna o preço médio de vendas (receita / quantidade de produtos).
     *
     * @return float Preço médio de venda.
     */
    public function getOrdersRetailPrice() {
        return number_format((float)$this->getQueryWithDateFilter()->avg('price'),2,".",".");
    }

    /**
     * Retorna o ticket médio de venda (receita / total de pedidos).
     *
     * @return float Ticket médio.
     */
    public function getOrdersAverageOrderValue() {
        if($this->getOrdersCount()> 0 ){
            return number_format((float)($this->getOrdersRevenue() / $this->getOrdersCount() ) , 2, '.', '.');
        }else
            return 0;
    }


    private function getQueryWithDateFilter(){
        return OrderItems::whereBetween('order_date',[$this->startDate , $this->endtDate]);
    }
}
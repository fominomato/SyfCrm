<?php
/**
 * Created by PhpStorm.
 * User: Andre
 * Date: 01/07/2015
 * Time: 11:42
 */

namespace elever\ClienteBundle\Entity;

use PrincipalBundle\Entity\EbUsuario;
use Doctrine\ORM\EntityRepository;

class TemperaturaRepository extends EntityRepository
{

	/**
	 * Metodo para buscar e retornar clientes
	 * @param array $params
	 * @param EbUsuario $user
	 * @return array |void
	 */
	public function getTemperaturas (array $params, EbUsuario $user)
	{
		$sql = $this->createQueryBuilder("t");
		$this->setFilter($params, $sql);
		return $sql->getQuery()->getArrayResult();
	}

	/**
	 * Metodo para construcao de query de busca
	 * @param array $params
	 * @param $sqlBuilder
	 * @return QueryBuilder
	 */
	private function setFilter (array $params, &$sqlBuilder)
	{
		$sqlBuilder->where("t.ativo = 1");

		if (count($params) > 0) {
			foreach ($params as $key => $value) {
				$aux = preg_replace("/\./", "", $key);
				$sqlBuilder->andWhere("{$key} = :{$aux}")
					->setParameter("{$aux}", $value);
			}
		}
	}

} 
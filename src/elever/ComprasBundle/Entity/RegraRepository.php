<?php

namespace elever\ComprasBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * RegraRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class RegraRepository extends EntityRepository
{

    /**
     * Metodo para buscar e retornar regras por empresa
     * @param int $params
     * @return array |void
     */
    public function getRegrasByEmpresa ($params)
    {
        $sql = $this->createQueryBuilder("r")
            ->select("r, rtv")
            ->innerJoin('r.idEmpresa', 'pc')
            ->innerJoin('r.idTipoValor', 'rtv')
            ->where('pc.idEmpresa = :id' )
            ->andWhere("r.ativo = 1")
            ->setParameter('id', $params);
        return $sql->getQuery()->getArrayResult();
    }

    /**
     * Metodo para buscar e retornar regras por categoria de pedido
     * @param int $params
     * @return array |void
     */
    public function getRegrasByCategoria ($params)
    {
        $sql = $this->createQueryBuilder('r')
            ->select("r, rtv")
            ->innerJoin('r.idProdutoCategoria', 'pc')
            ->innerJoin('r.idTipoValor', 'rtv')
            ->where('pc.idProdutoCategoria = :id' )
            ->andWhere("r.ativo = 1")
            ->setParameter('id', $params);

        return $sql->getQuery()->getArrayResult();
    }

	/**
	 * Metodo para buscar e retornar regras por segmento
	 * @param int $params
	 * @return array |void
	 */
	public function getRegrasBySegmento ($params)
	{
		$sql = $this->createQueryBuilder("r")
            ->select("r, rtv")
            ->innerJoin('r.idSegmento', 'pc')
            ->innerJoin('r.idTipoValor', 'rtv')
            ->where('pc.idSegmento = :id' )
            ->andWhere("r.ativo = 1")
            ->setParameter('id', $params);
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
		if (count($params) > 0) {
			foreach ($params as $key => $value) {
				$aux = preg_replace("/\./", "", $key);
				$sqlBuilder->andWhere("{$key} = :{$aux}")
					->setParameter("{$aux}", $value);
			}
		}
	}


}
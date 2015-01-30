<?php

namespace Benchmark\Propel\Models\Base;

use \Exception;
use \PDO;
use Benchmark\Propel\Models\Lemon as ChildLemon;
use Benchmark\Propel\Models\LemonQuery as ChildLemonQuery;
use Benchmark\Propel\Models\Map\LemonTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'lemon' table.
 *
 *
 *
 * @method     ChildLemonQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildLemonQuery orderByTreeId($order = Criteria::ASC) Order by the tree_id column
 *
 * @method     ChildLemonQuery groupById() Group by the id column
 * @method     ChildLemonQuery groupByTreeId() Group by the tree_id column
 *
 * @method     ChildLemonQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildLemonQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildLemonQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildLemonQuery leftJoinTree($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tree relation
 * @method     ChildLemonQuery rightJoinTree($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tree relation
 * @method     ChildLemonQuery innerJoinTree($relationAlias = null) Adds a INNER JOIN clause to the query using the Tree relation
 *
 * @method     ChildLemonQuery leftJoinSeed($relationAlias = null) Adds a LEFT JOIN clause to the query using the Seed relation
 * @method     ChildLemonQuery rightJoinSeed($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Seed relation
 * @method     ChildLemonQuery innerJoinSeed($relationAlias = null) Adds a INNER JOIN clause to the query using the Seed relation
 *
 * @method     \Benchmark\Propel\Models\TreeQuery|\Benchmark\Propel\Models\SeedQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildLemon findOne(ConnectionInterface $con = null) Return the first ChildLemon matching the query
 * @method     ChildLemon findOneOrCreate(ConnectionInterface $con = null) Return the first ChildLemon matching the query, or a new ChildLemon object populated from the query conditions when no match is found
 *
 * @method     ChildLemon findOneById(int $id) Return the first ChildLemon filtered by the id column
 * @method     ChildLemon findOneByTreeId(int $tree_id) Return the first ChildLemon filtered by the tree_id column
 *
 * @method     ChildLemon[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildLemon objects based on current ModelCriteria
 * @method     ChildLemon[]|ObjectCollection findById(int $id) Return ChildLemon objects filtered by the id column
 * @method     ChildLemon[]|ObjectCollection findByTreeId(int $tree_id) Return ChildLemon objects filtered by the tree_id column
 * @method     ChildLemon[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class LemonQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Benchmark\Propel\Models\Base\LemonQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'lemon-test', $modelName = '\\Benchmark\\Propel\\Models\\Lemon', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildLemonQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildLemonQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildLemonQuery) {
            return $criteria;
        }
        $query = new ChildLemonQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildLemon|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = LemonTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(LemonTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildLemon A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, tree_id FROM lemon WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildLemon $obj */
            $obj = new ChildLemon();
            $obj->hydrate($row);
            LemonTableMap::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildLemon|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildLemonQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(LemonTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildLemonQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(LemonTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLemonQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(LemonTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(LemonTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LemonTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the tree_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTreeId(1234); // WHERE tree_id = 1234
     * $query->filterByTreeId(array(12, 34)); // WHERE tree_id IN (12, 34)
     * $query->filterByTreeId(array('min' => 12)); // WHERE tree_id > 12
     * </code>
     *
     * @see       filterByTree()
     *
     * @param     mixed $treeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLemonQuery The current query, for fluid interface
     */
    public function filterByTreeId($treeId = null, $comparison = null)
    {
        if (is_array($treeId)) {
            $useMinMax = false;
            if (isset($treeId['min'])) {
                $this->addUsingAlias(LemonTableMap::COL_TREE_ID, $treeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($treeId['max'])) {
                $this->addUsingAlias(LemonTableMap::COL_TREE_ID, $treeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LemonTableMap::COL_TREE_ID, $treeId, $comparison);
    }

    /**
     * Filter the query by a related \Benchmark\Propel\Models\Tree object
     *
     * @param \Benchmark\Propel\Models\Tree|ObjectCollection $tree The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildLemonQuery The current query, for fluid interface
     */
    public function filterByTree($tree, $comparison = null)
    {
        if ($tree instanceof \Benchmark\Propel\Models\Tree) {
            return $this
                ->addUsingAlias(LemonTableMap::COL_TREE_ID, $tree->getId(), $comparison);
        } elseif ($tree instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(LemonTableMap::COL_TREE_ID, $tree->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByTree() only accepts arguments of type \Benchmark\Propel\Models\Tree or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tree relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildLemonQuery The current query, for fluid interface
     */
    public function joinTree($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tree');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Tree');
        }

        return $this;
    }

    /**
     * Use the Tree relation Tree object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Benchmark\Propel\Models\TreeQuery A secondary query class using the current class as primary query
     */
    public function useTreeQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTree($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tree', '\Benchmark\Propel\Models\TreeQuery');
    }

    /**
     * Filter the query by a related \Benchmark\Propel\Models\Seed object
     *
     * @param \Benchmark\Propel\Models\Seed|ObjectCollection $seed  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildLemonQuery The current query, for fluid interface
     */
    public function filterBySeed($seed, $comparison = null)
    {
        if ($seed instanceof \Benchmark\Propel\Models\Seed) {
            return $this
                ->addUsingAlias(LemonTableMap::COL_ID, $seed->getLemonId(), $comparison);
        } elseif ($seed instanceof ObjectCollection) {
            return $this
                ->useSeedQuery()
                ->filterByPrimaryKeys($seed->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySeed() only accepts arguments of type \Benchmark\Propel\Models\Seed or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Seed relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildLemonQuery The current query, for fluid interface
     */
    public function joinSeed($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Seed');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Seed');
        }

        return $this;
    }

    /**
     * Use the Seed relation Seed object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Benchmark\Propel\Models\SeedQuery A secondary query class using the current class as primary query
     */
    public function useSeedQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSeed($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Seed', '\Benchmark\Propel\Models\SeedQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildLemon $lemon Object to remove from the list of results
     *
     * @return $this|ChildLemonQuery The current query, for fluid interface
     */
    public function prune($lemon = null)
    {
        if ($lemon) {
            $this->addUsingAlias(LemonTableMap::COL_ID, $lemon->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the lemon table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(LemonTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            LemonTableMap::clearInstancePool();
            LemonTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(LemonTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(LemonTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            LemonTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            LemonTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // LemonQuery

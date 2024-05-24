<?php

namespace Yajra\DataTables;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Relations\MorphTo;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use Illuminate\Database\Eloquent\Relations\Relation;
use Yajra\DataTables\Exceptions\Exception;

class EloquentDataTable extends QueryDataTable
{
    /**
     * @var \Illuminate\Database\Eloquent\Builder
     */
    protected $query;

    /**
     * Can the DataTable engine be created with these parameters.
     *
<<<<<<< HEAD
     * @param  mixed  $source
=======
     * @param mixed $source
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return bool
     */
    public static function canCreate($source)
    {
        return $source instanceof Builder || $source instanceof Relation;
    }

    /**
     * EloquentEngine constructor.
     *
<<<<<<< HEAD
     * @param  mixed  $model
=======
     * @param mixed $model
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function __construct($model)
    {
        $builder = $model instanceof Builder ? $model : $model->getQuery();
        parent::__construct($builder->getQuery());

        $this->query = $builder;
    }

    /**
     * Add columns in collection.
     *
     * @param  array  $names
     * @param  bool|int  $order
     * @return $this
     */
    public function addColumns(array $names, $order = false)
    {
        foreach ($names as $name => $attribute) {
            if (is_int($name)) {
                $name = $attribute;
            }

            $this->addColumn($name, function ($model) use ($attribute) {
                return $model->getAttribute($attribute);
            }, is_int($order) ? $order++ : $order);
        }

        return $this;
    }

    /**
     * If column name could not be resolved then use primary key.
     *
     * @return string
     */
    protected function getPrimaryKeyName()
    {
        return $this->query->getModel()->getKeyName();
    }

    /**
     * Compile query builder where clause depending on configurations.
     *
<<<<<<< HEAD
     * @param  mixed  $query
     * @param  string  $columnName
     * @param  string  $keyword
     * @param  string  $boolean
=======
     * @param mixed  $query
     * @param string $columnName
     * @param string $keyword
     * @param string $boolean
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    protected function compileQuerySearch($query, $columnName, $keyword, $boolean = 'or')
    {
        $parts    = explode('.', $columnName);
        $column   = array_pop($parts);
        $relation = implode('.', $parts);

        if ($this->isNotEagerLoaded($relation)) {
            return parent::compileQuerySearch($query, $columnName, $keyword, $boolean);
        }

<<<<<<< HEAD
        if ($this->isMorphRelation($relation)) {
            $query->{$boolean . 'WhereHasMorph'}($relation, '*', function (Builder $query) use ($column, $keyword) {
                parent::compileQuerySearch($query, $column, $keyword, '');
            });
        } else {
            $query->{$boolean . 'WhereHas'}($relation, function (Builder $query) use ($column, $keyword) {
                parent::compileQuerySearch($query, $column, $keyword, '');
            });
        }
=======
        $query->{$boolean . 'WhereHas'}($relation, function (Builder $query) use ($column, $keyword) {
            parent::compileQuerySearch($query, $column, $keyword, '');
        });
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Resolve the proper column name be used.
     *
<<<<<<< HEAD
     * @param  string  $column
=======
     * @param string $column
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return string
     */
    protected function resolveRelationColumn($column)
    {
        $parts      = explode('.', $column);
        $columnName = array_pop($parts);
        $relation   = implode('.', $parts);

        if ($this->isNotEagerLoaded($relation)) {
            return $column;
        }

        return $this->joinEagerLoadedColumn($relation, $columnName);
    }

    /**
<<<<<<< HEAD
     * Check if a relation is a morphed one or not.
     *
     * @param  string  $relation
     * @return bool
     */
    protected function isMorphRelation($relation)
    {
        $isMorph = false;
        if ($relation !== null && $relation !== '') {
            $relationParts = explode('.', $relation);
            $firstRelation = array_shift($relationParts);
            $model         = $this->query->getModel();
            $isMorph       = method_exists($model, $firstRelation) && $model->$firstRelation() instanceof MorphTo;
        }

        return $isMorph;
    }

    /**
     * Check if a relation was not used on eager loading.
     *
     * @param  string  $relation
=======
     * Check if a relation was not used on eager loading.
     *
     * @param  string $relation
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return bool
     */
    protected function isNotEagerLoaded($relation)
    {
        return ! $relation
            || ! array_key_exists($relation, $this->query->getEagerLoads())
            || $relation === $this->query->getModel()->getTable();
    }

    /**
     * Join eager loaded relation and get the related column name.
     *
<<<<<<< HEAD
     * @param  string  $relation
     * @param  string  $relationColumn
     * @return string
     *
=======
     * @param string $relation
     * @param string $relationColumn
     * @return string
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @throws \Yajra\DataTables\Exceptions\Exception
     */
    protected function joinEagerLoadedColumn($relation, $relationColumn)
    {
        $table     = '';
        $lastQuery = $this->query;
        foreach (explode('.', $relation) as $eachRelation) {
            $model = $lastQuery->getRelation($eachRelation);
            switch (true) {
                case $model instanceof BelongsToMany:
                    $pivot   = $model->getTable();
                    $pivotPK = $model->getExistenceCompareKey();
                    $pivotFK = $model->getQualifiedParentKeyName();
                    $this->performJoin($pivot, $pivotPK, $pivotFK);

                    $related = $model->getRelated();
                    $table   = $related->getTable();
                    $tablePK = $related->getForeignKey();
                    $foreign = $pivot . '.' . $tablePK;
                    $other   = $related->getQualifiedKeyName();

                    $lastQuery->addSelect($table . '.' . $relationColumn);
                    $this->performJoin($table, $foreign, $other);

                    break;

                case $model instanceof HasOneThrough:
                    $pivot    = explode('.', $model->getQualifiedParentKeyName())[0]; // extract pivot table from key
<<<<<<< HEAD
                    $pivotPK  = $pivot . '.' . $model->getFirstKeyName();
=======
                    $pivotPK  = $pivot . '.' . $model->getLocalKeyName();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    $pivotFK  = $model->getQualifiedLocalKeyName();
                    $this->performJoin($pivot, $pivotPK, $pivotFK);

                    $related = $model->getRelated();
                    $table   = $related->getTable();
<<<<<<< HEAD
                    $tablePK = $model->getSecondLocalKeyName();
                    $foreign = $pivot . '.' . $tablePK;
                    $other   = $related->getQualifiedKeyName();

                    $lastQuery->addSelect($lastQuery->getModel()->getTable().'.*');

=======
                    $tablePK = $related->getForeignKey();
                    $foreign = $pivot . '.' . $tablePK;
                    $other   = $related->getQualifiedKeyName();

>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    break;

                case $model instanceof HasOneOrMany:
                    $table     = $model->getRelated()->getTable();
                    $foreign   = $model->getQualifiedForeignKeyName();
                    $other     = $model->getQualifiedParentKeyName();
                    break;

                case $model instanceof BelongsTo:
                    $table     = $model->getRelated()->getTable();
                    $foreign   = $model->getQualifiedForeignKeyName();
                    $other     = $model->getQualifiedOwnerKeyName();
                    break;

                default:
                    throw new Exception('Relation ' . get_class($model) . ' is not yet supported.');
            }
            $this->performJoin($table, $foreign, $other);
            $lastQuery = $model->getQuery();
        }

        return $table . '.' . $relationColumn;
    }

    /**
     * Perform join query.
     *
<<<<<<< HEAD
     * @param  string  $table
     * @param  string  $foreign
     * @param  string  $other
     * @param  string  $type
=======
     * @param string $table
     * @param string $foreign
     * @param string $other
     * @param string $type
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    protected function performJoin($table, $foreign, $other, $type = 'left')
    {
        $joins = [];
        foreach ((array) $this->getBaseQueryBuilder()->joins as $key => $join) {
            $joins[] = $join->table;
        }

        if (! in_array($table, $joins)) {
            $this->getBaseQueryBuilder()->join($table, $foreign, '=', $other, $type);
        }
    }
}

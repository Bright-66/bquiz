<?php include_once "db.php";
session_start();

class DB
{
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=db13";
    protected $pdo;
    protected $table;

    public static $type = [
        1 => '健康新知',
        2 => '菸害防制',
        3 => '癌症防治',
        4 => '慢性病防治',
    ];

    public function __construct($table)
    {
        $this->table = $table;
        $this->pdo   = new PDO($this->dsn, 'root', '');
    }
    public function all(...$arg)
    {
        $sql = "SELECT * From $this -> table";
        if (! empty($arg[0])) {
            if (is_array($arg[0])) {
                $where = $this->a2s($arg[0]);
                $sql   = $sql . " WHERE " . join(" && ", $where);
            } else {
                $sql .= $arg[0];
            }
        }
        if (! empty($arg[1])) {
            $sql = $sql . $arg[1];
        }

        return $this->fetchAll($sql);
    }
    public function find($id)
    {
        $sql = "SELECT * FROM $this->table ";

        if (is_array($id)) {
            $where = $this->a2s($id);
            $sql   = $sql . " WHERE " . join(" &&　", $where);

        } else {
            $sql .= " WHERE `id`='$id' ";
        }

        return $this->fetchOne($sql);
    }
    public function save($array)
    {
        if (isset($array['id'])) {

            $id = $array['id'];
            unset($array['id']);
            $set = $this->a2s($array);
            $sql = "UPDATE $this->table SET " . join(',', $set) . " where `id`='$id'";
        } else {
            $cols = array_keys($array);
            $sql  = "INSERT INTO $this->table (`" . join("`,`", $cols) . "`) VALUES('" . join("','", $array) . "')";
        }
        return $this->pdo->exec($sql);
    }

    public function del($id)
    {
        $sql = "DELETE FROM $this->table ";

        if (is_array($id)) {
            $where = $this->a2s($id);
            $sql   = $sql . " WHERE " . join(" && ", $where);
        } else {
            $sql .= "WHERE `id`='$id' ";
        }
        return $this->pdo->exec($sql);
    }
    public function a2s($array)
    {
        $tmp = [];
        foreach ($array as $key => $value) {
            $tmp[] = "`$key`='$value'";
        }
        return $tmp;
    }
    function max()

}
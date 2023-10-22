<?php

namespace Aeforge\Dumper;

use Aeforge\Dumper\Config;

/**
 * class Dumper
 * 
 * @author AEForge <https://github.com/aeforge>
 */
class Dumper
{
    /**
     * Stores the variables to be dumped
     * @access private
     * @var mixed
     */
    private $vars;
    /**
     * Constructor
     * @access public
     * @param mixed ...$vars
     */
    public function __construct($vars)
    {
        $this->vars = $vars;
    }
    /**
     * Dumps the content of vars
     * @access public
     * @return void
     */
    public function dump()
    {
        //Check if its being called from a console
        if (!in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) && !headers_sent()) {
            header('HTTP/1.1 500 Internal Server Error');
        }
        $this->dumpVars($this->vars);
    }
    /**
     * Dumps the content of vars and ends the script
     * @access public
     * @return void
     */
    public function dumpAndDie()
    {
        //Check if its being called from a console
        if (!in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) && !headers_sent()) {
            header('HTTP/1.1 500 Internal Server Error');
        }
        $this->dumpVars($this->vars);
        exit(1);
    }
    /**
     * Dumps the contents of var in view
     *
     * @param mixed $var
     * @return void
     */
    private function dumpVars($var)
    {
        $type = strtolower(gettype($var));
        $config = new Config;
        switch ($type) {
            case "object":
            case "resource":
                $this->dumpVars((array) $var);
                break;
            case "array":
                echo "<table style='padding:5px;background-color:" . $config->get("background-color") . ";' border='0' cellspacing='0' width='100%'>";
                foreach ($var as $k => $v) {
                    $typeColor = $config->get(strtolower(gettype($v)));
                    echo "<tr>";
                echo "<td valign='top'>";
                echo "<span style='color:" . $config->get("variable-color") . ";'>" . $k . "</span>";
                echo "</td>";
                echo "<td valign='top' style='user-select:none;'>";
                echo $type;
                echo "</td>";
                echo "<td valign='top'>";
                echo "<span style='color:". $typeColor . ";font-size:16px;'>";
                $this->dumpVars($v);
                echo "</span>";
                echo "</td>";
                echo "</tr>";
                }
                break;
            case "boolean":
                echo (bool) $var ? "True" : "False";
                break;
            case "integer":
            case "double":
            case "string":
                echo $var;
                break;
            case "null":
                echo "NULL";
                break;
            case "unknown type":
            default:
                echo "N/A (Unknown Type)";
        }
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: brynbeaudry
 * Date: 2017-11-02
 * Time: 2:03 PM
 */

class TaskTest extends PHPUnit\Framework\TestCase
{
    private $CI;

    /**
     * @bbeau
     *
     * command to run test from project root folder:
     *
     * /usr/local/bin/php ./vendor/bin/phpunit
     *
     * check your php is correctly configured by this command
     * ls /usr/local/bin | grep php
     *
     * use one of the results listed or get linux
     *
     * confirm with php -v, in the bin dir
     *
     * Thats all you need.
     * The original test was not very helpful, and would obviously pass with anything if you're using a magic method
     *
     * @bbeau
     *
     */


    private $GLOBALS = array();

    private $task;
    private $inputs;
    private $failures;
    private $countPass;

    public function setUp()
    {


        // Load CI instance normally
        $this->CI =& get_instance();
        $this->task = new $this->CI->task;
        $this->failures = array();
        $this->countPass = 0;

        if (isset($this->CI)) {
            $this->task = new $this->CI->task;
        } else {
            print_r("no task");
        }
        print_r($this->task);

        $this->inputs = array(
            'fV2MxxW36p7WX0bpCqr6yrJGSkhpMO1tqQudj6nOPjbfay7fJqhU9kUWyNuUEK6x' => "64 Characters && Length < 64",
            'uyVCPdX6AU1kTo4EWyfup0ElEm8kqaKdh0vhDzskRFkjf5kdsDpwp0D8buYQvZ7' => "63 Characters && Length < 64",
            'fV2MxxW36p7WX0bpCqr6yrJGSkhpMO1tqQudj6nOPjbfay7fJqhU9kUWyNuUEK6     ' => "63 Characters and +2 Whitespace && Length < 64 : Sanitizes whtspc",
            'abc' => "Alphabet Characters",
            123 => "Numbers",
            3 => '3 @ < 4',
            4 => '4 @ < 4',
            -1 => 'Negative Number',
        );

        $this->testTaskSetMethods();

        echo "FINISHED, all good";
    }



    public function testTaskSetMethods()
    {
        foreach ($this->task as $attr => $val) {
            echo PHP_EOL;
            echo '~'.strtoupper($attr).'~';
            $attrStr = 'set'.ucfirst($attr); //name of the set fn
            echo PHP_EOL;
            $ignore = array('deadline', 'status', 'flag');
            if(!(strcmp($attr,$ignore[0]) && strcmp($attr,$ignore[1]) && strcmp($attr,$ignore[2])))
                    continue;
            foreach ($this->inputs as $input => $affrm) {
                $isAcceptable = 1;
                try {
                    $this->assertEquals(true, $this->task->$attrStr($input), "Description: $affrm\n");
                } catch (PHPUnit\Framework\ExpectationFailedException $e) {
                    array_push($this->failures,"Failed! : \nInput: $input\nFunction : $attrStr\n".$e->getMessage().PHP_EOL);
                    $isAcceptable = 0;
                }
                if($isAcceptable) {
                    echo PHP_EOL;
                    $this->countPass++;
                    echo "Passed! : \nInput: $input\nFunction : $attrStr \nDescription: $affrm" . PHP_EOL;
                }
            }
            echo PHP_EOL;
        }
        echo PHP_EOL;
        if(!empty($this->failures))
        {
            throw new PHPUnit\Framework\ExpectationFailedException(
                "_______________FAILURES_________________\n\t".implode("\n\t", $this->failures)."\n\t". count($this->failures)." assertions failed!\n!\n"
                    ."\t$this->countPass assertions Passed!\n!\n"
            );
        }
    }




}
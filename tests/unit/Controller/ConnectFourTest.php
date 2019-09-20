<?php namespace App\Tests;

use App\Controller\ConnectFourController;

class ConnectFourTest extends \Codeception\Test\Unit
{
    /**
     * @var \App\Tests\UnitTester
     */
    protected $tester;
    /**
     * @var ConnectFourController
     */
    private $controller;

    protected function _before()
    {
        $this->controller = new ConnectFourController();
    }

    protected function _after()
    {
    }

    // tests
    public function testVerticalWinner()
    {
        $this->assertEquals("Yellow", $this->controller->whoIsWinner([
            "A_Yellow", "A_Red", "A_Yellow", "A_Yellow", "A_Yellow", "A_Yellow"
        ]));

        $this->assertEquals("Yellow", $this->controller->whoIsWinner([
            "A_Red", "A_Red", "A_Yellow", "A_Yellow", "A_Red", "A_Red",
            "B_Yellow", "B_Yellow", "B_Yellow", "B_Yellow", "B_Yellow", "A_Red"
        ]));

        $this->assertEquals("Red", $this->controller->whoIsWinner([
            "A_Red", "A_Red", "A_Red", "A_Red", "A_Red", "A_Yellow"
        ]));

        $this->assertEquals("Draw", $this->controller->whoIsWinner([
            "A_Red", "A_Yellow", "A_Red", "A_Yellow", "A_Red", "A_Yellow"
        ]));
    }

    public function testHorizontalWinner()
    {
        $this->assertEquals("Yellow", $this->controller->whoIsWinner([
            "A_Yellow", "B_Yellow", "C_Yellow", "D_Yellow", "E_Red", "F_Yellow"
        ]));

        $this->assertEquals("Draw", $this->controller->whoIsWinner([
            "A_Yellow", "B_Yellow", "C_Red", "D_Yellow", "E_Red", "F_Yellow"
        ]));

        $this->assertEquals("Yellow", $this->controller->whoIsWinner([
            "A_Yellow", "B_Yellow", "C_Red", "D_Yellow", "E_Red", "F_Yellow",
            "A_Yellow", "B_Yellow", "C_Yellow", "D_Yellow", "E_Red", "F_Yellow",
            "A_Yellow", "B_Red", "C_Red", "D_Red", "E_Red", "F_Yellow",
        ]));
    }

    public function testDiagonalRightWinner()
    {
        $this->assertEquals("Yellow", $this->controller->whoIsWinner([
            "A_Yellow", "B_Yellow", "C_Red", "D_Yellow", "E_Red", "F_Red", "G_Yellow",
            "A_Red", "B_Yellow", "C_Red", "D_Red", "E_Yellow", "F_Yellow", "G_Red",
            "A_Red", "B_Red", "C_Yellow", "D_Yellow", "E_Red", "F_Yellow", "G_Yellow",
            "A_Yellow", "B_Red", "C_Red", "D_Yellow", "E_Red", "F_Yellow", "G_Yellow",
        ]));

        $this->assertEquals("Yellow", $this->controller->whoIsWinner([
            "A_Red", "B_Yellow", "C_Red", "D_Yellow", "E_Red", "F_Red",
            "A_Red", "B_Yellow", "C_Yellow", "D_Red", "E_Red", "F_Yellow",
            "A_Red", "B_Red", "C_Yellow", "D_Yellow", "E_Red", "F_Yellow",
            "A_Yellow", "B_Red", "C_Red", "D_Yellow", "E_Yellow", "F_Yellow",
        ]));
    }

    public function testDiagonalLeftWinner()
    {
        $this->assertEquals("Red", $this->controller->whoIsWinner([
            "A_Red", "B_Yellow", "C_Red", "D_Yellow", "E_Red", "F_Yellow", "G_Yellow",
            "A_Red", "B_Red", "C_Yellow", "D_Yellow", "E_Red", "F_Red", "G_Yellow",
            "A_Red", "B_Red", "C_Yellow", "D_Red", "E_Yellow", "F_Red", "G_Red",
            "A_Red", "B_Red", "C_Yellow", "D_Yellow", "E_Yellow", "F_Red", "G_Yellow",
        ]));
    }

    public function testBasic() {
        $this->assertEquals($this->controller->whoIsWinner([
            "A_Yellow", "A_Red", "A_Yellow", "A_Yellow", "A_Yellow", "A_Yellow"
        ]),
            "Yellow"
        );

        $this->assertEquals($this->controller->whoIsWinner([
            "A_Red", "A_Red", "A_Red", "A_Red", "A_Red", "A_Red"
        ]),
            "Red"
        );

        $this->assertEquals($this->controller->whoIsWinner([
            "A_Red", "A_Red", "A_Red", "A_Yellow"
        ]),
            "Draw"
        );

        $this->assertEquals($this->controller->whoIsWinner([
            "C_Yellow", "E_Red", "G_Yellow", "B_Red",
            "D_Yellow", "B_Red", "B_Yellow", "G_Red",
            "C_Yellow", "C_Red", "D_Yellow", "F_Red",
            "E_Yellow", "A_Red", "A_Yellow", "G_Red",
            "A_Yellow", "F_Red", "F_Yellow", "D_Red",
            "B_Yellow", "E_Red", "D_Yellow", "A_Red",
            "G_Yellow", "D_Red", "D_Yellow", "C_Red"
        ]),
            "Yellow"
        );
        $this->assertEquals($this->controller->whoIsWinner([
            "C_Yellow", "B_Red", "B_Yellow", "E_Red",
            "D_Yellow", "G_Red", "B_Yellow", "G_Red",
            "E_Yellow", "A_Red", "G_Yellow", "C_Red",
            "A_Yellow", "A_Red", "D_Yellow", "B_Red",
            "G_Yellow", "A_Red", "F_Yellow", "B_Red",
            "D_Yellow", "A_Red", "F_Yellow", "F_Red",
            "B_Yellow", "F_Red", "F_Yellow", "G_Red",
            "A_Yellow", "F_Red", "C_Yellow", "C_Red",
            "G_Yellow", "C_Red", "D_Yellow", "D_Red",
            "E_Yellow", "D_Red", "E_Yellow", "C_Red",
            "E_Yellow", "E_Red"
        ]),
            "Yellow"
        );
        $this->assertEquals($this->controller->whoIsWinner([
            "F_Yellow", "G_Red", "D_Yellow", "C_Red",
            "A_Yellow", "A_Red", "E_Yellow", "D_Red",
            "D_Yellow", "F_Red", "B_Yellow", "E_Red",
            "C_Yellow", "D_Red", "F_Yellow", "D_Red",
            "D_Yellow", "F_Red", "G_Yellow", "C_Red",
            "F_Yellow", "E_Red", "A_Yellow", "A_Red",
            "C_Yellow", "B_Red", "E_Yellow", "C_Red",
            "E_Yellow", "G_Red", "A_Yellow", "A_Red",
            "G_Yellow", "C_Red", "B_Yellow", "E_Red",
            "F_Yellow", "G_Red", "G_Yellow", "B_Red",
            "B_Yellow", "B_Red"
        ]),
            "Red"
        );
        $this->assertEquals($this->controller->whoIsWinner([
            "A_Yellow", "B_Red", "B_Yellow", "C_Red",
            "G_Yellow", "C_Red", "C_Yellow", "D_Red",
            "G_Yellow", "D_Red", "G_Yellow", "D_Red",
            "F_Yellow", "E_Red", "D_Yellow"
        ]),
            "Red"
        );
        $this->assertEquals($this->controller->whoIsWinner([
            "A_Red", "B_Yellow", "A_Red", "B_Yellow",
            "A_Red", "B_Yellow", "G_Red", "B_Yellow"
        ]),
            "Yellow"
        );
        $this->assertEquals($this->controller->whoIsWinner([
            "A_Red", "B_Yellow", "A_Red", "E_Yellow",
            "F_Red", "G_Yellow", "A_Red", "G_Yellow"
        ]),
            "Draw"
        );
    }
}
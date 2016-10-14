<?php

namespace Morontt\DQL\String;

use Doctrine\ORM\Query\AST\Functions\FunctionNode;
use Doctrine\ORM\Query\Lexer;
use Doctrine\ORM\Query\Parser;
use Doctrine\ORM\Query\SqlWalker;

/**
 * DQL function for extract substring
 *
 * Example: substr('alphabet', 3, 2)
 */
class Substr extends FunctionNode
{
    public $string = null;
    public $from = null;
    public $count = null;

    /**
     * @param Parser $parser
     */
    public function parse(Parser $parser)
    {
        $parser->match(Lexer::T_IDENTIFIER);
        $parser->match(Lexer::T_OPEN_PARENTHESIS);
        $this->string = $parser->StringPrimary();
        $parser->match(Lexer::T_COMMA);
        $this->from = $parser->ArithmeticPrimary();
        $parser->match(Lexer::T_COMMA);
        $this->count = $parser->ArithmeticPrimary();
        $parser->match(Lexer::T_CLOSE_PARENTHESIS);
    }

    /**
     * @param SqlWalker $sqlWalker
     * @return string
     */
    public function getSql(SqlWalker $sqlWalker)
    {
        return sprintf(
            'substr(%s, %s, %s)',
            $this->string->dispatch($sqlWalker),
            $this->from->dispatch($sqlWalker),
            $this->count->dispatch($sqlWalker)
        );
    }
}

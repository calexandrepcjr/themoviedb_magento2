<?php declare(strict_types = 1);

namespace Capcj\TheMovieDb\Tests\Unit\Lib;

use PHPUnit\Framework\TestCase;

use Capcj\TheMovieDb\Lib\{
    Env,
    Contracts\Environment
};

final class EnvTest extends TestCase
{
    public function testEnvHasProperInterface(): void
    {
        $this->assertInstanceOf(Environment::class, new Env());
    }

    public function testStringDefault(): void
    {
        $this->assertSame('default', (new Env())->string('API', 'default'));
    }

    public function testString(): void
    {
        $env = new Env();
        $env->putString('THEMOVIEDB_API_KEY', 'ABCD');
        $this->assertSame(
            'ABCD',
            $env->string('THEMOVIEDB_API_KEY', 'default')
        );
    }
}

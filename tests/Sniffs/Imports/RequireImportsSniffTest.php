<?php
declare(strict_types=1);

namespace NeutronStandardTest;

use PHPUnit\Framework\TestCase;

class RequireImportsSniffTest extends TestCase {
	public function testRequireImportsSniff() {
		$fixtureFile = __DIR__ . '/RequireImportsFixture.php';
		$sniffFile = __DIR__ . '/../../../NeutronStandard/Sniffs/Imports/RequireImportsSniff.php';
		$helper = new SniffTestHelper();
		$phpcsFile = $helper->prepareLocalFileForSniffs($sniffFile, $fixtureFile);
		$phpcsFile->process();
		$lines = $helper->getWarningLineNumbersFromFile($phpcsFile);
		$this->assertEquals([
			23,
			26,
			30,
			33,
			35,
			43,
			48,
			52,
		], $lines);
	}
}

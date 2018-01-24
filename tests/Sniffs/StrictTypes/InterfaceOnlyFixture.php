<?php

namespace Just\Some\Testing;

use Brain\Nonces\NonceInterface;

/**
 * Interface SettingsPageAuthInterface
 */
interface SettingsPageAuthInterface {
	/**
	 * @param array $request_data
	 *
	 * @return bool
	 */
	public function isAllowed(array $request_data = []): bool;

	/**
	 * @return NonceInterface
	 */
	public function nonce(): NonceInterface;

	/**
	 * @return string
	 */
	public function cap(): string;

	// Some things
	public function someThings();
}
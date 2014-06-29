<?php
/**
 *  Copyright (C) 2014 bitschubser.org
 *
 *
 *  Permission is hereby granted, free of charge, to any person obtaining a copy
 *  of this software and associated documentation files (the "Software"), to 
 *  deal in the Software without restriction, including without limitation the
 *  rights to use, copy, modify, merge, publish, distribute, sublicense, and/or
 *  sell copies of the Software, and to permit persons to whom the Software is
 *  furnished to do so, subject to the following conditions:
 *
 *  The above copyright notice and this permission notice shall be included in
 *  all copies or substantial portions of the Software.
 *
 *  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 *  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 *  FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 *  AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER 
 *  LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 *  OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN 
 *  THE SOFTWARE.
 */

function travelermap_upgrade() {
	$currentVersion = get_option("travelermap_version");
	if ( version_compare( $currentVersion, TM_VERSION, '===' ) )	
		return;
	if( version_compare($currentVersion, '1.1.0', '<')) {
		travelermap_upgrade_1_0_0_to_1_1_0();
	}
	if( version_compare($currentVersion, '1.2.0', '<')) {
		travelermap_upgrade_1_1_0_to_1_2_0();
	}
}

function travelermap_upgrade_1_0_0_to_1_1_0() {
	$settings = get_option('traverlermap_settings');
	
	if (!$settings) {
		$settings = array(
		);
		update_option('travelermap_settings', $settings);
	}

	update_option("travelermap_version", '1.1.0');
	update_option("travelermap_db_version", '1.1.0');

}

function travelermap_upgrade_1_1_0_to_1_2_0() {
	$settings = get_option('traverlermap_settings');
	
	if (!$settings) {
		$settings = array(
		);
		update_option('travelermap_settings', $settings);
	}

	update_option("travelermap_version", '1.2.0');
	update_option("travelermap_db_version", '1.2.0');

}

travelermap_upgrade();

?>
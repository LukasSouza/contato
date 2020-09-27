<?php
namespace App\Model;

use PHPUnit\Framework\TestCase as TestCase;

class ContactTest extends TestCase
{
    public function testStoreNewContact()
	{
		$contact = new Contact;
        $contact->save();

		$actual = $contact->save();
		$expected = "1";

		$this->assertEquals($expected,$actual);;
	}
}

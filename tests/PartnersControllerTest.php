<?php

use TypiCMS\Modules\Slides\Models\Slide;

class SlidesControllerTest extends TestCase
{
    public function testAdminIndex()
    {
        $response = $this->call('GET', 'admin/slides');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStoreFails()
    {
        $input = ['fr.title' => 'test', 'fr.slug' => ''];
        $this->call('POST', 'admin/slides', $input);
        $this->assertRedirectedToRoute('admin.slides.create');
        $this->assertSessionHasErrors();
    }

    public function testStoreSuccess()
    {
        $object = new Slide();
        $object->id = 1;
        Slide::shouldReceive('create')->once()->andReturn($object);
        $input = ['fr.title' => 'test', 'fr.slug' => 'test', 'fr.body' => '', 'position' => '1'];
        $this->call('POST', 'admin/slides', $input);
        $this->assertRedirectedToRoute('admin.slides.edit', ['id' => 1]);
    }

    public function testStoreSuccessWithRedirectToList()
    {
        $object = new Slide();
        $object->id = 1;
        Slide::shouldReceive('create')->once()->andReturn($object);
        $input = ['fr.title' => 'test', 'fr.slug' => 'test', 'fr.body' => '', 'position' => '1', 'exit' => true];
        $this->call('POST', 'admin/slides', $input);
        $this->assertRedirectedToRoute('admin.slides.index');
    }
}

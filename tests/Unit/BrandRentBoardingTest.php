<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\BrandRentBoardings;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BrandRentBoardingTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_brand_rent_boarding()
    {
        $user = User::factory()->create([
            'role' => 'owner' // Sesuaikan dengan struktur role Anda
        ]);
        
        $brand = BrandRentBoardings::create([
            'nama_brand' => 'Test Brand',
            'alamat' => 'Jl. Test No. 123',
            'id_pemilik' => $user->id,
            'logo' => null,
            'dokumen_izin' => 'Test Document',
            'dokumen_ktp' => null,
            'dokumen_npwp' => null,
            'dokumen_lain' => null
        ]);

        $this->assertInstanceOf(BrandRentBoardings::class, $brand);
        $this->assertEquals('Test Brand', $brand->nama_brand);
        $this->assertEquals('Jl. Test No. 123', $brand->alamat);
        $this->assertEquals($user->id, $brand->id_pemilik);
        
        // Assert database contains the record
        $this->assertDatabaseHas('brand_kost', [
            'nama_brand' => 'Test Brand',
            'alamat' => 'Jl. Test No. 123',
            'id_pemilik' => $user->id
        ]);
    }

    /** @test */
    public function it_belongs_to_an_owner()
    {
        $user = User::factory()->create([
            'name' => 'John Doe',
            'role' => 'owner'
        ]);
        
        $brand = BrandRentBoardings::factory()->create([
            'id_pemilik' => $user->id
        ]);


        // Test relationship exists
        $this->assertInstanceOf(User::class, $brand->owners);
        $this->assertEquals($user->id, $brand->owners->id);
        $this->assertEquals('John Doe', $brand->owners->name);

    }

    /** @test */
    public function it_requires_nama_brand()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);
        
        BrandRentBoardings::create([
            'alamat' => 'Jl. Test',
            'id_pemilik' => 1
            // nama_brand missing
        ]);
    }

    /** @test */
    public function it_requires_alamat()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);
        
        BrandRentBoardings::create([
            'nama_brand' => 'Test Brand',
            'id_pemilik' => 1
            // alamat missing
        ]);
    }

    /** @test */
    public function it_can_have_optional_documents()
    {
        $user = User::factory()->create([
            "role" => "admin"
        ]);
        
        $brand = BrandRentBoardings::create([
            'nama_brand' => 'Test Brand',
            'alamat' => 'Test Address',
            'id_pemilik' => $user->id,
            'dokumen_izin' => null,
            'dokumen_ktp' => null,
            'dokumen_npwp' => null,
            'dokumen_lain' => null
        ]);

        $this->assertNull($brand->dokumen_izin);
        $this->assertNull($brand->dokumen_ktp);
        $this->assertNull($brand->dokumen_npwp);
        $this->assertNull($brand->dokumen_lain);
    }

    /** @test */
    public function it_can_have_logo()
    {
        $user = User::factory()->create([
            'role' => 'owner' // Sesuaikan dengan struktur role Anda
        ]);
        $brand = BrandRentBoardings::create([
            'nama_brand' => 'Test Brand',
            'alamat' => 'Test Address', 
            'id_pemilik' => $user->id,
            'logo' => 'test-logo.jpg'
        ]);

        $this->assertEquals('test-logo.jpg', $brand->logo);
    }
}
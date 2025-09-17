# Brand Kos API Spec

# Create brand kos API

Endpoint: POST /api/brandkos
Headers:
-Authorization: token
Request Body :

```json
{
    "id_pemilik": 1,
    "nama": "Kos Adi",
    "logo": "logo.png",
    "alamat": "Jl. Merdeka No. 10",
    "dokumen_izin": "izin.pdf",
    "dokumen_ktp": "ktp.pdf",
    "dokumen_npwp": "npwp.pdf",
    "dokumen_lain": "lain.pdf"
}
```

Response Body Success :

```json
{
    "data": {
        "id": 1,
        "id_pemilik": 1,
        "nama": "Kos Adi",
        "logo": "logo.png",
        "alamat": "Jl. Merdeka No. 10",
        "dokumen_izin": "izin.pdf",
        "dokumen_ktp": "ktp.pdf",
        "dokumen_npwp": "npwp.pdf",
        "dokumen_lain": "lain.pdf",
        "status_verifikasi": "pending",
        "tanggal_verifikasi": null
    }
}
```

Response Body Error :

```json
{
    "errors": "Nama brand sudah terdaftar"
}
```

# Get All Brand Kos

Endpoint: GET /api/brandkos

Response Body Success :

```json
{
    "data": [
        {
            "id": 1,
            "id_pemilik": 1,
            "nama": "Kos Adi",
            "alamat": "Jl. Merdeka No. 10",
            "status_verifikasi": "pending"
        },
        {
            "id": 2,
            "id_pemilik": 2,
            "nama": "Kos Budi",
            "alamat": "Jl. Sudirman No. 5",
            "status_verifikasi": "verified"
        }
    ]
}
```

# Get Brand Kos by ID

Endpoint: GET /api/brandkos/:id
Headers:
-Authorization: token

Response Body Success :

```json
{
    "data": {
        "id": 1,
        "id_pemilik": 1,
        "nama": "Kos Adi",
        "logo": "logo.png",
        "alamat": "Jl. Merdeka No. 10",
        "dokumen_izin": "izin.pdf",
        "dokumen_ktp": "ktp.pdf",
        "dokumen_npwp": "npwp.pdf",
        "dokumen_lain": "lain.pdf",
        "status_verifikasi": "pending",
        "tanggal_verifikasi": null
    }
}
```

Response Body Error :

```json
{
    "errors": "Brand Kos not found"
}
```

# Update Brand Kos

Endpoint: PUT /api/brandkos/:id
Headers:
-Authorization: token
Request Body :

```json
{
    "nama": "Kos Adi Update",
    "alamat": "Jl. Merdeka No. 20",
    "logo": "logo_new.png",
    "dokumen_izin": "izin_new.pdf"
}
```

Response Body Success :

```json
{
    "data": {
        "id": 1,
        "id_pemilik": 1,
        "nama": "Kos Adi Update",
        "logo": "logo_new.png",
        "alamat": "Jl. Merdeka No. 20",
        "dokumen_izin": "izin_new.pdf",
        "dokumen_npwp": "npwp.pdf",
        "dokumen_lain": "lain.pdf",
        "status_verifikasi": "pending",
        "tanggal_verifikasi": null
    }
}
```

Response Body Error :

```json
{
    "errors": "Nothing changed"
}
```

# Delete Store

Endpoint: DELETE /api/stores/:id
Headers:
-Authorization: token

Response Body Success :

```json
{
    "message": "Brand Kos deleted successfully"
}
```

Response Body Error :

```json
{
    "errors": "Brand Kos not found or unauthorized"
}
```

# Search Brand Kos

Endpoint: GET /api/brandkos/search?name=keyword&alamat=keyword
Query Params:
name: nama brand kos query param
alamat: alamat brand kos query param

Headers:
-Authorization: token

Response Body Success :

```json
{
    "data": {
        "id": 1,
        "id_pemilik": 1,
        "nama": "Kos Adi",
        "logo": "logo.png",
        "alamat": "Jl. Merdeka No. 10",
        "dokumen_izin": "izin.pdf",
        "dokumen_ktp": "ktp.pdf",
        "dokumen_npwp": "npwp.pdf",
        "dokumen_lain": "lain.pdf",
        "status_verifikasi": "pending",
        "tanggal_verifikasi": null
    }
}
```

Response Body Error :

```json
{
    "errors": "Brand Kos not found"
}
```

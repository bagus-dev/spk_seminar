<?php

// Validation language settings
return [
	// Core Messages
	'noRuleSets'            => 'Tidak ada kumpulan aturan yang ditentukan dalam konfigurasi Validasi!',
	'ruleNotFound'          => '{0} bukan aturan yang valid!',
	'groupNotFound'         => '{0} bukan aturan validasi grup!',
	'groupNotArray'         => '{0} grup aturan harus berupa array!',
	'invalidTemplate'       => '{0} bukanlah template Validasi yang valid!',

	// Rule Messages
	'alpha'                 => '{field} hanya boleh berisi karakter alfabet!',
	'alpha_dash'            => '{field} hanya boleh berisi karakter alfanumerik, garis bawah, dan tanda hubung!',
	'alpha_numeric'         => '{field} hanya boleh berisi karakter alfanumerik!',
	'alpha_numeric_punct'   => '{field} hanya boleh berisi karakter alfanumerik, spasi, dan  ~ ! # $ % & * - _ + = | : . karakter.',
	'alpha_numeric_space'   => '{field} hanya boleh berisi karakter alfanumerik dan spasi!',
	'alpha_space'           => '{field} hanya boleh berisi karakter alfabet dan spasi!',
	'decimal'               => '{field} harus berisi angka desimal!',
	'differs'               => '{field} harus berbeda dari {param}!',
	'equals'                => '{field} harus sama persis: {param}!',
	'exact_length'          => '{field} harus persis panjangnya dengan {param} karakter!',
	'greater_than'          => '{field} harus berisi angka yang lebih besar dari {param}!',
	'greater_than_equal_to' => '{field} harus berisi angka yang lebih besar dari atau sama dengan {param}!',
	'hex'                   => '{field} hanya boleh berisi karakter heksadesimal!',
	'in_list'               => '{field} harus salah satu dari: {param}!',
	'integer'               => '{field} harus berisi bilangan bulat!',
	'is_natural'            => '{field} hanya boleh berisi angka!',
	'is_natural_no_zero'    => '{field} hanya boleh berisi angka dan harus lebih besar dari nol!',
	'is_not_unique'         => '{field} harus berisi nilai yang sudah ada sebelumnya dalam database!',
	'is_unique'             => '{field} harus berisi nilai unik!',
	'less_than'             => '{field} harus berisi angka kurang dari {param}!',
	'less_than_equal_to'    => '{field} harus berisi angka kurang dari atau sama dengan {param}!',
	'matches'               => '{field} tidak cocok dengan {param}!',
	'max_length'            => 'Panjang {field} tidak boleh melebihi {param} karakter!',
	'min_length'            => 'Panjang {field} setidaknya harus {param} karakter!',
	'not_equals'            => '{field} tidak boleh: {param}!',
	'not_in_list'           => '{field} tidak boleh salah satu dari: {param}!',
	'numeric'               => '{field} harus berisi angka saja!',
	'regex_match'           => 'Format {field} salah!',
	'required'              => '{field} harus diisi!',
	'required_with'         => '{field} harus diisi jika {param} ada!',
	'required_without'      => '{field} harus diisi jika {param} tidak ada!',
	'string'                => '{field} harus berupa string yang valid!',
	'timezone'              => '{field} harus berupa zona waktu yang valid!',
	'valid_base64'          => '{field} harus berupa string base64 yang valid!',
	'valid_email'           => '{field} harus berisi alamat email yang valid!',
	'valid_emails'          => '{field} harus berisi semua alamat email yang valid!',
	'valid_ip'              => '{field} harus berisi IP yang valid!',
	'valid_url'             => '{field} harus berisi URL yang valid!',
	'valid_date'            => '{field} harus berisi tanggal yang valid!',

	// Credit Cards
	'valid_cc_num'          => '{field} tampaknya bukan nomor kartu kredit yang valid!',

	// Files
	'uploaded'              => '{field} bukan file unggahan yang valid!',
	'max_size'              => '{field} file terlalu besar!',
	'is_image'              => '{field} bukan file gambar unggahan yang valid!',
	'mime_in'               => '{field} tidak memiliki jenis mime yang valid!',
	'ext_in'                => '{field} tidak memiliki ekstensi file yang valid!',
	'max_dims'              => '{field} bisa jadi bukan gambar, atau terlalu lebar atau tinggi!',
];
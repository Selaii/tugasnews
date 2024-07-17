<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        News::create([
            'headline' => 'The Fascinating World of Cats',
            'image' => 'images/2560px-A-Cat.jpg',
            'text' => 'Cats are known for their independent nature and playful behavior...',
            'user_id' => 1, // Assuming user with ID 1 is admin
        ]);

        News::create([
            'headline' => 'Koala: Penghuni Hutan Eucalyptus yang Terancam Punah',
            'image' => 'images/koala.jpg', // Adjust path if necessary
            'text' => 'Koala (Phascolarctos cinereus) adalah mamalia marsupial yang hanya ditemukan di Australia. Dengan penampilan yang menggemaskan, koala memiliki tubuh berukuran sedang, hidung besar, dan bulu abu-abu yang lembut, menjadikannya salah satu ikon fauna Australia. Koala menghabiskan sekitar 18 hingga 22 jam sehari untuk tidur, biasanya di atas pohon eucalyptus, yang menjadi sumber utama makanan mereka.
            Koala sangat bergantung pada daun eucalyptus, yang memiliki kandungan racun dan rendah kalori. Meskipun begitu, sistem pencernaan mereka telah beradaptasi untuk mengolah daun ini dengan efektif, memungkinkan mereka untuk mendapatkan nutrisi yang diperlukan. Ada sekitar 50 spesies eucalyptus yang dapat dimakan oleh koala, tetapi mereka lebih memilih beberapa jenis tertentu yang kaya akan nutrisi.
            Koala memiliki pola hidup soliter dan teritorial, dengan setiap individu memiliki area rumah sendiri. Mereka menggunakan suara khas untuk berkomunikasi, terutama selama musim kawin. Suara ini dapat terdengar seperti raungan yang kuat, dan menjadi tanda bagi koala jantan untuk menarik perhatian betina.
            Sayangnya, populasi koala saat ini mengalami penurunan yang signifikan akibat kehilangan habitat, perubahan iklim, dan penyakit. Penebangan hutan, kebakaran hutan, dan urbanisasi telah mengancam tempat tinggal alami mereka, menjadikan koala sebagai salah satu spesies yang paling terancam punah di Australia. Berbagai organisasi dan pemerintah bekerja sama dalam upaya konservasi untuk melindungi koala dan habitatnya, tetapi tantangan yang dihadapi tetap besar. Menyelamatkan koala bukan hanya tanggung jawab pemerintah, tetapi juga masyarakat luas. Edukasi dan kesadaran tentang pentingnya konservasi dapat membantu memastikan bahwa generasi mendatang masih bisa melihat keindahan dan keunikan koala di alam liar.',
            'user_id' => 1, // Assuming user with ID 1 is admin
        ]);

        // Add more sample news articles as needed
    }
}

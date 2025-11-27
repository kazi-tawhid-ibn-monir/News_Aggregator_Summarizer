<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use Carbon\Carbon;

class NewsSeeder extends Seeder
{
    public function run()
    {
        News::create([
            'title' => 'AI Revolutionizes Global News Industry',
            'excerpt' => 'Artificial intelligence is transforming how we consume and understand news.',
            'content' => 'Artificial intelligence is fundamentally transforming the global news industry. Machine learning algorithms now help journalists analyze massive datasets, identify trending stories, and even generate preliminary drafts for routine reporting. News aggregators powered by AI can curate personalized news feeds based on reader preferences and behavior patterns. Natural language processing enables automatic summarization of lengthy articles, making information more accessible to busy readers. However, this technological revolution also raises important questions about journalistic integrity, bias in algorithms, and the future role of human reporters.',
            'category' => 'Tech',
            'source' => 'TechCrunch',
            'published_at' => Carbon::now()->subHours(2),
        ]);

        News::create([
            'title' => 'Bangladesh Economy Shows Strong Growth',
            'excerpt' => 'Latest reports indicate positive economic indicators across multiple sectors.',
            'content' => 'Bangladesh economy has demonstrated remarkable resilience and growth in recent quarters. The latest economic reports show positive indicators across manufacturing, exports, and domestic consumption. The ready-made garment sector continues to be a major driver, with exports reaching record highs. Additionally, the technology sector is emerging as a new growth engine, with numerous startups attracting international investment. Remittances from overseas workers remain strong, supporting household incomes. Government infrastructure projects are creating jobs and improving connectivity. However, economists caution that inflation control and ensuring inclusive growth remain important challenges.',
            'category' => 'Politics',
            'source' => 'The Daily Star',
            'published_at' => Carbon::now()->subHours(3),
        ]);

        News::create([
            'title' => 'Global Climate Summit Reaches Agreement',
            'excerpt' => 'World leaders commit to ambitious carbon reduction targets.',
            'content' => 'In a historic development, world leaders at the Global Climate Summit have reached a comprehensive agreement on carbon reduction targets. The accord commits participating nations to achieve net-zero emissions by 2050, with interim targets set for 2030 and 2040. Developed countries have pledged substantial financial support to help developing nations transition to clean energy. The agreement includes provisions for monitoring and enforcement, addressing concerns about accountability. Environmental groups have cautiously welcomed the deal while emphasizing the need for immediate action. Scientists warn that the window for preventing catastrophic climate change is rapidly closing.',
            'category' => 'Politics',
            'source' => 'BBC News',
            'published_at' => Carbon::now()->subHours(5),
        ]);

        News::create([
            'title' => 'Sports: Cricket World Cup Update',
            'excerpt' => 'Exciting matches continue as teams compete for championship glory.',
            'content' => 'The Cricket World Cup continues to deliver thrilling matches and unexpected results. In yesterday\'s match, the underdog team pulled off a stunning upset against one of the tournament favorites. Star players are showcasing exceptional skills, with several record-breaking performances. The tournament has seen packed stadiums and millions of viewers worldwide. Analysts are closely watching the points table as teams compete for semi-final spots. The next round of matches promises even more excitement as traditional rivals prepare to face off.',
            'category' => 'Sports',
            'source' => 'ESPN',
            'published_at' => Carbon::now()->subHours(8),
        ]);

        News::create([
            'title' => 'New Healthcare Initiative Launched',
            'excerpt' => 'Government announces nationwide program to improve medical services.',
            'content' => 'The government has unveiled an ambitious healthcare initiative aimed at improving medical services across the nation. The program includes plans to establish new health centers in rural areas, upgrade existing facilities, and recruit additional medical professionals. A special focus will be placed on preventive care and health education. Digital health records and telemedicine services will be expanded to improve access in remote regions. The initiative also addresses mental health services, which have been historically underfunded. Public health experts have praised the comprehensive approach while noting that successful implementation will require sustained commitment and funding.',
            'category' => 'Health',
            'source' => 'Health Today',
            'published_at' => Carbon::now()->subHours(10),
        ]);

        News::create([
            'title' => 'Education Reform Plans Unveiled',
            'excerpt' => 'Ministry of Education reveals comprehensive plans for curriculum changes.',
            'content' => 'The Ministry of Education has announced sweeping reforms to the national curriculum, emphasizing critical thinking, creativity, and practical skills. The new framework will reduce rote memorization and introduce project-based learning across all grade levels. Technology integration will be enhanced, with coding and digital literacy becoming core subjects. Teacher training programs will be revamped to support the new teaching methods. The reforms also address concerns about exam pressure by introducing continuous assessment methods. Education experts have generally welcomed the changes, though some have raised concerns about implementation challenges in resource-constrained schools.',
            'category' => 'Education',
            'source' => 'Education Weekly',
            'published_at' => Carbon::now()->subHours(12),
        ]);
        News::create([
            'title' => 'ঢাকায় নতুন মেট্রো রেল স্টেশন চালু',
            'excerpt' => 'মেট্রো রেল এখন আরও বেশি এলাকায় সেবা দিচ্ছে।',
            'content' => 'পুরো খবরের বিস্তারিত টেক্সট এখানে থাকবে...',
            'category' => 'Bangladesh',
            'source' => 'প্রথম আলো',
            'published_at' => Carbon::now()->subHours(3),
        ]);

        News::create([
            'title' => 'চট্টগ্রামে বন্দর এলাকায় যানজট কমাতে নতুন উদ্যোগ',
            'excerpt' => 'বন্দর এলাকার রাস্তা সংস্কার ও নতুন সিগন্যাল চালু করা হয়েছে।',
            'content' => 'Local traffic development news...',
            'category' => 'Local',
            'source' => 'কালের কণ্ঠ',
            'published_at' => Carbon::now()->subHours(6),
        ]);

        News::create([
            'title' => 'রাজশাহীতে আমের বাম্পার ফলন',
            'excerpt' => 'চাষীরা এবার ভালো দামে আম বিক্রির আশা করছেন।',
            'content' => 'Mango production news...',
            'category' => 'Bangladesh',
            'source' => 'সমকাল',
            'published_at' => Carbon::now()->subHours(8),
        ]);
    }
}

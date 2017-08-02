<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

use App\Track;
use App\Album;
use App\Mixtape;
use App\Video;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        /*
         * START OPTIONAL REMOVE AFTER INSTALL SECTION
         */
        /*
         * check if site has been installed.
         */
        if(
            env('APP_NAME') == 'Laravel' ||
            env('DB_DATABASE') == 'homestead' ||
            env('DB_USERNAME') == 'homestead' ||
            env('DB_PASSWORD') == 'secret'
        )
        {
            /*
             * no database information is set, let's run install.
             */
            return $this->install( $request );
        }
        elseif( cache('step2') !== null && $request->has('token') && cache('step2') == $request->token )
        {
            /*
             * install has started, render step 2.
             */
            return $this->step2( $request );
        }
        elseif( cache('step3') !== null && $request->has('token') && cache('step3') == $request->token )
        {
            /*
             * bulk import has been selected, render step 3.
             */
            return $this->step3( $request );
        }
        /*
         * END OPTIONAL REMOVE AFTER INSTALL SECTION
         */
        /*
         * site is installed, render homepage.
         */
        $tracks = Track::where('status','enabled')->orderBy('created_at','desc')->limit(20)->get();
        $albums = Album::where('status','enabled')->orderBy('created_at','desc')->limit(6)->get();
        $mixtapes = Mixtape::where('status','enabled')->orderBy('created_at','desc')->limit(6)->get();
        $videos = Video::where('status','enabled')->orderBy('created_at','desc')->limit(4)->get();
        return view('index', ['tracks'=>$tracks,'albums'=>$albums,'mixtapes'=>$mixtapes,'videos'=>$videos]);

    }

    private function step3(Request $request)
    {
        if( $request->isMethod('post') )
        {
            Cache::forget('step3');
            return redirect('/');
        }
        return view('install.import');
    }

    private function step2(Request $request)
    {
		\Artisan::call('key:generate');
        \Artisan::call('migrate');
        $p = new \App\Page;
        $p->title = 'About Us';
        $p->slug = 'about-us';
        $p->keywords = '';
        $p->description = '';
        $p->content = '<p>On our website you can find links that lead to media files. These files are stored somewhere else on the internet and are not a part of this website. '.env('APP_NAME').' does not carry any responsibility for them. '.env('APP_NAME').' only collects links and indexes contents of other sites. If your copyrighted material has been indexed by our site and you want this material to be removed, contact us immediately at '.env('DMCA_EMAIL').'. We will reply to & honor every request. Please notice it may take up to 48 hours to process your request. Do not hesitate to voice any concerns by contacting us !</p><p>This website was made using the free <a href="https://github.com/scrapewww/AutomatedMusicSite" target="_blank" title="Automated Music Site Script">Automated Music Site Script</a>.</p>';
        $p->save();
        $p = new \App\Page;
        $p->title = 'Privacy Policy';
        $p->slug = 'privacy-policy';
        $p->keywords = '';
        $p->description = '';
        $p->content = '<p>'.env('APP_NAME').' is committed to protecting your privacy online. We will not rent, sell or share your personal information with third parties, except when required by law.</p><p><b>What information do we collect?</b></p><p>'.env('APP_NAME').' doesn\'t collect any personal information at the moment.</p><p><b>What are “cookies” and how do we use them?</b></p><p>Cookies are a feature of Web browser that allows Web servers to recognize the computer used to access a Web site. Cookies are used to manage your user session to ensure smooth and personalized browsing experience. We also partner with third party ad networks and allow such networks to use cookies to collect non-personally identifiable data for targeting and serving ads. Users can opt-out of this behavioral targeting by visiting the Network Advertising Initiative\'s consumer page at http://www.networkadvertising.org/managing/opt_out.asp.</p><p><b>Your Consent</b></p><p>By using our website, you consent to the collection and use of your personal information by '.env('APP_NAME').' as outlined in this Privacy Policy.</p><p><b>Modification of Privacy Policy</b></p><p>'.env('APP_NAME').' may modify the Privacy Policy which will become effective immediately upon posting on the website. Your continued use of the website and any associated services indicates your acceptance of the Privacy Policy.</p>';
        $p->save();
        $p = new \App\Page;
        $p->title = 'Disclaimer';
        $p->slug = 'disclaimer';
        $p->keywords = '';
        $p->description = '';
        $p->content = '<p>1. Content</p><p>The author reserves the right not to be responsible for the topicality, correctness, completeness or quality of the information provided. Liability claims regarding damage caused by the use of any information provided, including any kind of information which is incomplete or incorrect,will therefore be rejected.</p><p>All offers are not-binding and without obligation. Parts of the pages or the complete publication including all offers and information might be extended, changed or partly or completely deleted by the author without separate announcement.</p><p>2. Referrals and links</p><p>The author is not responsible for any contents linked or referred to from his pages – unless he has full knowledge of illegal contents and would be able to prevent the visitors of his site from viewing those pages. If any damage occurs by the use of information presented there, only the author of the respective pages might be liable, not the one who has linked to these pages. Furthermore the author is not liable for any postings or messages published by users of discussion boards, guestbooks or mailing lists provided on his page.</p><p>3. Copyright</p><p>The author intended not to use any copyrighted material for the publication or, if not possible, to indicate the copyright of the respective object.</p><p>The copyright for any material created by the author is reserved. Any duplication or use of objects such as images, diagrams, sounds or texts in other electronic or printed publications is not permitted without the author’s agreement.</p><p>4. Privacy policy</p><p>If the opportunity for the input of personal or business data (email addresses, name, addresses) is given, the input of these data takes place voluntarily. The use and payment of all offered services are permitted – if and so far technically possible and reasonable – without specification of any personal data or under specification of anonymous data or an alias. The use of published postal addresses, telephone or fax numbers and email addresses for marketing purposes is prohibited, offenders sending unwanted spam messages will be punished.</p><p>5. Legal validity of this disclaimer</p><p>This disclaimer is to be regarded as part of the internet publication which you were referred from. If sections or individual terms of this statement are not legal or correct, the content or validity of the other parts remain uninfluenced by this fact.</p><p>If you own any music that is posted on the site and would like to request it to be taken off please email me with proof of ownership and I will take the link down within 3 business days. Thank you!</p>';
        $p->save();
        $p = new \App\Page;
        $p->title = 'DMCA';
        $p->slug = 'dmca';
        $p->keywords = '';
        $p->description = '';
        $p->content = '<p>'.env('APP_NAME').' respects the rights of copyright holders and will work with said copyright holders to ensure that infringing material is removed from our service. we monitor file uploads to make sure that copyrighted material is not uploaded and pro actively ban any users that do not adhere to our terms of service. in cases where you feel a file infringes on your copyright or the copyright of someone you represent, we encourage you to use this page to notify us.</p><p>'.env('APP_NAME').' will respond to any and all take down requests that comply with the requirements of the digital millennium copyright act (dmca), and other applicable intellectual property laws.</p><p>if you believe that a file that a user has uploaded to '.env('APP_NAME').' infringes on your copyright then please e-mail us ('.env('DMCA_EMAIL').') to submit a request. be sure to include your relationship to the owner of the copyrighted work, your full contact info, and the url of the song/album you are referring to.</p>';
        $p->save();
        Cache::forget('step2');
        return redirect('/?token='.$request->token);
    }

    private function install(Request $request)
    {
        if( $request->isMethod('post') )
        {
            $env = base_path('.env');
            $lines = file($env, FILE_IGNORE_NEW_LINES);
            $new_lines = [];
            foreach( $lines AS $line )
            {
                $e = explode('=', $line);
                if( $request->has( $e[0] ) )
                {
                    $name = $e[0];
                    $line = $e[0].'="'.$request->$name.'"';
                }
                $new_lines[] = $line;
            }
            file_put_contents($env, implode(PHP_EOL, $new_lines));
            $token = str_random(40);
            if( $request->BULK_IMPORT == 1 )
            {
                cache(['step3' => $token], 720);
            }
            cache(['step2' => $token], 720);
            return redirect('/?token='.$token);
        }
        return view('install.index');
    }
}

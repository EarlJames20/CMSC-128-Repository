<?php
    session_start();
    include_once("connections/connection.php");
    $con = connection();

    if(isset($_SESSION['username'])){
        if((time() - $_SESSION['currenttime']) > 300){
            header("Location:sessionexpiry.php");
        }else{
            $_SESSION['currenttime'] = time();
        }
    }

    if(isset($_POST['submit'])){

        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        
        $sql = "INSERT INTO `persons_list`(`name`, `email`, `message`) 
                VALUES ('$name','$email','$message')";
                
        $con->query($sql) or die ($con->error);
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>unmuffled.</title>
        <link rel="stylesheet" href="css/frontend.css">
    </head>
    <body>
        <div class="navbar">
            <div class="container">
                <a hef="#" class="logo">unmuffled.</a>

                <img id="menu" class="mobile-menu" src="images/menu.svg">

                <nav>
                    <img id="menu-exit" class="exit" src="images/exit.svg">

                    <ul class="primary-nav">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Blogs & More</a></li>
                        <li><a href="#">Community</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="logout.php">Log out</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <img class="title-pic" src="images/title.png">

        <section class="title">    
            <div class="header">
                <h1>
                <?php
                if(!isset($_SESSION['username'])){
                    echo "Welcome, Guest!";
                } else{
                    echo "Welcome, ". $_SESSION['username']. "!";
                }
                ?></h1>
                <h1>This is a curation of what words mean to me</h1>
                <blockquote>A glimpse of my thoughts―from words taken from the sun, to lamentations caught in faded moonlight.</blockquote>
            </div>  
        </section>
        
        <section class="poetry-sec">
            <div class="subheader">
                <h2>poetry</h2>
            </div>

            <img class="img-right" src="images/img1.jpg">
           
            <div class="content-left">
                <h2>Cherry-picked lethargies</h2>
                <p>Stars die from when they lack the fuel to burn<br>
                Perhaps it's some form of lethargy<br>
                when physics decided that such splendor<br>
                can only last for so long<br>
                A handful of cherry-picked elements thrown<br>
                as kindling to a momentary fire</p>
                    
                <p>As a lover I always saw magnitudes in the fleeting<br>
                I held onto that like the hands of my mother<br>
                well maybe I shouldn't have because that time when<br>
                I wanted to write about stars would always remind me<br>
                how words leave me in knots<br>
                And this foolish notion of forever would follow<br>
                pretentiously decorating my life with seasonal ornaments<br>
                but then again I had wanted to believe I was them</p>
                        
                <p>What else could there be in this life<br>
                But the questioning of how frugal<br>
                the times I felt the air fill my lungs<br>
                But so generously rusted the ribs they took shelter from<br>
                weary of heavy sighs and muffled musings<br>
                And for some reason my soul would stick around<br> 
                for the crack of dawn each day</p>
                        
               <p>Until then, I can only hope the reason<br>
               is more than what I know of myself<br>
               Something more than cherry-picked lethargies</p>
            </div>

            <div class="content-right">
                <h2>Moonless</h2>
                <p>There I go again<br>
                Finding myself lost in the night<br>
                Misery creeping, looming nothingness<br>
                Nightshade afterthoughts bruising tainted skin<br>
                Although, still<br>
                This is nothing of grandiose novelty<br>
                To be haunted like this<br>
                Stale from the thought<br>
                Of everything irretrievable<br>
                To wish short-lived summers<br>
                In frozen wishing wells</p> 
                
                <p>And so I pin myself,<br>
                My eyes to an endless canvas<br>
                To have stars dwindling<br>
                In motifs stormed by fire and gold<br>
                Bleary eyes framing this hopelessness<br>
                I've grown too familiar with</p>
                
                <p>And soon<br>
                A clockwork latched<br>
                Onto these bones will end<br>
                Fireworks and revelries will quiet into ash<br>
                And I will disappear<br>
                Arms perched no more on windowsills<br>
                Knowing how moonless nights<br>
                Don't seem so ruthless after all</p>  
            </div>

            <img class="img-left" src="images/img2.jpg">
            
            <img class="img-right" src="images/img3.jpg">
               
            <div class="content-left">
                <h2>Chapter the twenty-first</h2>
                <p>80% of the ocean is unexplored<br>
                But what makes it that mysterious anyway<br>
                Other than birthing tempests<br>
                That bury ships and suns with salt<br>
                Leaving secrets afloat<br>
                Like bottled love letters</p>
                
                <p>What I see is a fractured<br>
                Mirror of myself, sinking<br>
                Conspiring swiss cottage dreams<br>
                In the first few hundred feet<br>
                Then writing love-plastered eulogies<br>
                In the thousand next<br>
                Where words sink beneath seafloors and hadal zones<br>
                And other places light refused to touch</p>
                
                <p>I know I still have much left to learn<br>
                I don't know how many shores<br>
                And ghost towns I have yet to skirt barefoot<br>
                I don’t know when loveless seas<br>
                Cease to storm themselves<br>
                Encore after encore<br>
                But in all consolation<br>
                I'm taking chances of knowing mine<br>
                One year at a time</p>
                
            </div>
        </section>


        <section class="prose-sec">
            <div class="subheader">
                <h2>prose</h2>
            </div>

            <img class="img-center" src="images/img4.jpg">
               
            <div class="content-center">
                <h2 class="center">To the days of the greatest poetry</h2>
                <p>That day I was alone at last, as bare as the skin of teeth. My body seemed to drift listlessly through a summer air 
                that could only remind me how sultry it felt. 
                Crushing stones and heavy breaths were the sound of loneliness. It was all the comfort I needed.
                <p>In a span of a few paces, I took the definition of no one and wore it like a straitjacket—I have never felt that free.</p>
                It was an emancipation that hid falsities in the cruelest ways. Yet somehow, frail limbs kept on swaying as though leaves 
                that had finally lost grip on sidewalk trees, only to land on roads where dreams and asphalt ceased to come, trampled by 
                strangers who aren't as innocent as their footsteps.
                Who knew you were one of them too. Someone, something that had its features forgotten like a grocery list. 
                Except you're the kind posted on fridge doors—unforgettable, still, in the most subtle ways.</p>
                <p>Skin to skin.</p>
                <p>Hollow secrets held in ribcage.</p>
                <p>Lovelorn nights spent in hushed melancholy.</p>
                <p>I knew that chance meeting was more than a recollection of what love was, it was a delusion of what it is. 
                I need of no sun overhead to flash those haunting disillusions when you fell out of it, because you were there again. 
                Within the earshot of my words, in a hopeless dream dying to get back to the nihility of you. Our eyes locking in, bidding goodbye...
                to the days of the greatest poetry.</p>
            </div>
                
            <img class="img-center" src="images/img5.jpg">

            <div class="content-center">
                <h2 class="center">Stalemate</h2>
                <p>This war I waged reached an impassable stalemate.</p> 
                <p>These soles were never meant to run away from the likes of you. To stand the test of time, calloused by what I could salvage from my undoing. 
                They tend to betray. They tend to go around in circles and figure eights, skirting safe havens only to relive a long gone ecstasy. 
                They tend to get back to you as though you are their maker. Longing to ash the sandpaper and sins of the body they belonged.</p>
                <p>This right here is stalemate. Limbs sprawled across the bed in the knowing that you will always try to haunt me. 
                Like a Victorian ghost barefaced, looming in the dead of night. 
                And although no solemn prayer would end this requiem for one, perhaps I am left one thing for certain—</p>
                <p>There are ghosts and mirages on a saltless sea. Who do not count for unburnt bodies and lovesick runaways. 
                Who will fester in your mind days after in stark verity. They will single-handedly sink you with riptides and love spells.</p>
                <p>But there are those who are even madder. Lovers who take words for salt. Sailors who poise seas with lines of prose. 
                Because what madness can compare to those who could love and dream. Who could brave and fear, only to love all over again.
                And that very thing can never, never be stale at all.</p>
            </div>
        </section>

        <section class="newsletter">

            <div class="container">
                <div class="newsletter-header">
                    <h1 class="header">Join our newsletter</h1>
                </div>
                <div class="newsletter">
                    <h2 class="subheader"></h2>
                
                    <form action="" method="post">
                        <label for="name">Name</label>
                        <input type="text" name="name" name="name">

                        <label for="email">Email</label>
                        <input type="text" name="email" name="email">

                        <label for="message">Message</label>
                        <textarea name="message" id="message" cols="30" rows="10" input type="text"></textarea>
                        
                        <input type="submit" name="submit" class="send-message" value="Send Message">
                    </form>

                </div>
            </div>
        </section>

        <script> 

            const mobileButton = document.getElementById('menu')
                nav = document.querySelector('nav');
                mobileButtonExit = document.getElementById('menu-exit');
            
            mobileButton.addEventListener('click', () => {
                nav.classList.add('menu-display');
            })

            mobileButtonExit.addEventListener('click', () => {
                nav.classList.remove('menu-display');
            })

        </script>

    </body>
</html>

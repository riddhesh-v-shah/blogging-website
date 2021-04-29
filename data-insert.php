<?php

require_once("app/init.php");
// $users = [
//     [
//         "username" => "krishna",
//         "password" => "kc123789",
//         "first_name" => "Krishna",
//         "last_name" => "Chhabria",
//         "email" => "krishnachhabria@gmail.com",
//         "address" => "Thane",
//         "phone" => "9819360930",
//     ],
//     [
//         "username" => "riddhesh",
//         "password" => "rs123789",
//         "first_name" => "Riddhesh",
//         "last_name" => "Shah",
//         "email" => "riddheshshah@gmail.com",
//         "address" => "Mulund",
//         "phone" => "9769069674",
//     ],
//     [
//         "username" => "shraddha",
//         "password" => "sk123789",
//         "first_name" => "Shraddha",
//         "last_name" => "Keniya",
//         "email" => "shraddhakeniya@gmail.com",
//         "address" => "Mulund",
//         "phone" => "9819360956",
//     ],
//     [
//         "username" => "soham",
//         "password" => "sk123789",
//         "first_name" => "Soham",
//         "last_name" => "Karalkar",
//         "email" => "sohamkaralkar@gmail.com",
//         "address" => "Nahur",
//         "phone" => "9769282821",
//     ],
//     [
//         "username" => "sahil",
//         "password" => "sd123789",
//         "first_name" => "Sahil",
//         "last_name" => "Dalvi",
//         "email" => "sahildalvi@gmail.com",
//         "address" => "Kurla",
//         "phone" => "9769474710",
//     ],
//     [
//         "username" => "sakshi",
//         "password" => "ss123789",
//         "first_name" => "Sakshi",
//         "last_name" => "Shah",
//         "email" => "sakshishah@gmail.com",
//         "address" => "Ghatkopar",
//         "phone" => "8879512619",
//     ],
//     [
//         "username" => "vidhi",
//         "password" => "vr123789",
//         "first_name" => "Vidhi",
//         "last_name" => "Rughwani",
//         "email" => "vidhirughwani@gmail.com",
//         "address" => "Bhandup",
//         "phone" => "9820098200",
//     ],
//     [
//         "username" => "dhanvi",
//         "password" => "ds123789",
//         "first_name" => "Dhanvi",
//         "last_name" => "Sheth",
//         "email" => "dhanvisheth@gmail.com",
//         "address" => "Vashi",
//         "phone" => "9821009821",
//     ],
//     [
//         "username" => "sarwasvi",
//         "password" => "si123789",
//         "first_name" => "Sarwasvi",
//         "last_name" => "Ingoley",
//         "email" => "sarwasviingoley@gmail.com",
//         "address" => "Thane",
//         "phone" => "9876543210",
//     ],
//     [
//         "username" => "ayush",
//         "password" => "as123789",
//         "first_name" => "Ayush",
//         "last_name" => "Shah",
//         "email" => "ayushshah@gmail.com",
//         "address" => "Mulund",
//         "phone" => "9988776655",
//     ]
// ];
// for($i=0;$i<sizeof($users);$i++):
//     $users[$i]["password"] = $hash->make($users[$i]["password"]);
//     $database->table("users")->insert($users[$i]);
// endfor;

$blogs = [
    [
        "title" => "Swaraj Or Azad Bharat?",
        "blogger_id" => "1",
        "image" => "1.jpg",
        "content" => "To begin with a very happy republic day to all of us who have been such an amazing audience to all the drama that has been unfolding in our country for so long. Kudos to all of us for that.
        This republic day gets along with itself a bittersweet feeling in my heart. A feeling that makes me feel like we have mocked our constitution enough now and the words like democracy or republic are slowly losing their meaning anyway.
        Recently, there had been a surprising turn of events and I have watched more patriotic movies than the genres I prefer watching usually. All of it has just made me ponder about one big question that why did we fight all those battles? With what motive did our ancestors think that we deserve ‘azadi’?
        Beginning right from the time when we have been invaded and exploited so much by the Mughals that they bestowed us with the status ‘Sone ki chidiya’. We laid golden eggs and we were and are one of the most fertile regions that exist on the planet. We needed leaders like Chhatrapati Shivaji Maharaj and many others to instill the light of Swaraj into our hearts which ignited the fire in our ancestors to free us from the clutches of the Mughals. It took them years, thousands of lives and sacrifices, tears, pain and hardships to see their dream of Swaraj getting fulfilled when we were freed.
        
        However, that did not last well and long with us. We were raided again and held captive as soon as the East India Company began expanding its roots on our soil. Even then, it took us tonnes of freedom fighters like Gandhiji, Tilakji, Boseji and multiple revolutionaries like Chandrashekhar Azadji, Bhagat Singhji and many more to acquire freedom. All our ancestors and great ancestors did this and thousand more sacrifices for one single reason – our freedom.
        I am nothing but an ungrateful Indian if I do not take moment here to thank them all for whatever contributions they made to get us where we are today. Safe and free.
        
        We made the constitution, we made our own democracy and we vowed to unitedly stand strong as a country but aren’t we all failing each time we put our selfish motives over our country’s motives? Each time one of us becomes corrupt or violates and exploits the rights bestowed upon us as a citizen of the country, we betray our land. Each time we fail to do our duty (as basic as voting) we fail our ancestors. Each time people become corrupt and think ‘iss desh ka kuch nai hoga’ we are letting down all those sacrifices made repeatedly for us.
        We have let our country down so much to a point that despite having an amazing educational history, we still do not have institutions that could confer upon us valuable degrees. The graduates end up going abroad, studying and living there.
        
        However, amidst all this, we keep forgetting that there are people out there in uniforms colored – green, blue, white and khaki. The people who work tirelessly amongst all the temperatures Mother Nature bestows them with. The ones ‘jinke ke liye apna desh, apni azadi se zyada kuch important nahi lagta, apni jaan bhi nai.
        
        This republic day, a big salute to all those heroes who do not have folklores about them but that never stops them from being the ‘rakshaks’ they are.
        
        We are Secular. Republic. Democratic.
        That’s all that matters.
        We have made enough Sacrifices but now it is time to make Peace so that we could have our own Prosperity.",
        "type" => "1",
        "published_on" => "2020-01-26",
        "is_published" => "1",
        "is_deleted" => "0"
    ],
    [
        "title" => "Opinion and facts",
        "blogger_id" => "2",
        "image" => "2.jpg",
        "content" => "Hello everyone. This post was not meant to be typed but with each passing day, the ruckus we are creating compels me to write this post. We, as a country, have been protesting too much recently against the introduction of the new bill, CAB ( Citizenship Amendment Bill).
        The more time I spend on all the social media sites, the more I realize how there are two sides of a coin. And apparently, each one of us has picked up a side.  It is either favored or unfavored.
        The aftermath that has been going on is not even surprising me anymore. We see each post that has been put up related to CAB with the same perspective as the side we chose to be on.
        
        Can we look at both sides and then decide which side should we actually be upon? I'M NOT GOING TO CHOOSE FOR YOU. IT IS YOUR CHOICE. 
        
        Favor of CAB:-
        CAB is a bill that would guarantee citizenship to the immigrants from 3 countries that already reside in India on or before 31st December 2014. However, there is a particular religion based differentiation here and the only religion which has been majorly excluded is Islam aka the Muslim people.
        Why you may ask?
        Because all the other three countries own the Muslim majority and hence they should be able to look after the immigrants.
         Why is this done?
        In order to provide citizenship to the citizens that have been staying in the country for long and also as a measure to cut off the excess people that we have here on this land.
        What they say?
        The fact that Indian Muslims have nothing to worry about. They'll only need to prove that they belong here and that's it. * basically proving their loyalty *
        Why only Muslims? Aren't we all suppose to prove our loyalty? Don't we all belong here?
        
        However, I may ask, why is the bill based upon religion only?
        Because apparently, that has been the only threat to us, ALWAYS. It is the same as terrorism and all the attacks that we have made upon each others' religion in past all the years. Religion was the main reason why we have 'Hindustan' and 'Pakistan' now. * laughs in a corner *
        
        Against CAB:-
        The Assamese fear that they would turn up into a minority in their very own homeland. CAB only includes 3 countries because apparently, it is hard to lay down boundaries when the remaining neighboring countries come into the picture. Picture this, if you stayed into some country like the USA and if they had such bills passing, how heartbreaking would it be for you to come back to India? You'd rather convert yourself than doing this. If you stay at a place which provides you everything you want and you pay your taxes too then why should you migrate or prove your loyalty?
        This is why we have protests all over the country and why we see pictures of India burning up in bits and pieces all over.
        We are all individuals who are entitled to have our own opinions. These opinions could differ from person to person.
        Its time we learn to respect each other's opinions.
        I have seen posts saying 'tear gas hi to tha. Konsa firing kar rahe the?'
        How heartless are you to forget that those are students? Students or the future of the country that you keep talking so much about. They were silently protesting until you started lathi charging them and broke into the premises and broke it down. This is not how we expect the police to function. We get that you have been assigned this duty but do not execute it this way.
        
        Coming to the topic of internet shutdowns, we have posts saying that internet shutdowns are done because they don't consider the youth responsible enough to post or repost things but however the same youth is mature enough to vote, drink and drive. Yes, there are a lot of people who have just been posting stories on the topic to sound cool or into the news and up to date. But we also need these posts and videos to go viral because somehow our Indian media could not lay its hands on them. They failed to report these lathi-charge videos to us. There is one more post that says that ' the police couldn't record their act because they were busy taking charge of the actions.'
        All the footage which is captured is raw. We all know that lathi-charge did happen. So what and whom are you even covering up for?
        Has anyone ever given a thought that maybe the Muslims we deny citizenship now could end up being a threat to us in the form of terrorism in the near future? Because well, each terrorist according to us is a Muslim only, right?
        
        WAKE UP. CHOOSE YOUR SIDE. BE HEARD. POST THINGS RESPONSIBLY.
        
        We want us to be secular but each time someone comments upon our religion, everything else comes tumbling down. We have bigger problems to face as a country guys.
        We have multiple rapes
        We have controversial encounters
        We have rising onion prices
        We have spiraled down economy
        We have an increasingly pacing unemployment
        We have a poorly malnourished population
        Lastly, we have ten thousand places to change their names from the existing ones because Allahabad aurtoon ko bacha paye na paye, Prayagraj to zarur bachayega.",
        "type" => "2",
        "published_on" => "2020-01-27",
        "is_published" => "1",
        "is_deleted" => "0"
    ],
    [
        "title" => "I Got Leh'd",
        "blogger_id" => "3",
        "image" => "3.jpg",
        "content" => "I know that seems like a really fun title and you won't believe me but I did buy a tee with literally the same written on it. I don't think a major part of you guys know but I had been on a trip to Leh-Ladakh and that is exactly what today I am going to post on.

        You don't need to have your bags packed and yet I'd take you on a journey that'd make you wish for having your bags packed and running off to Leh. First things first, this wasn't a planned trip. This happens for most of the trips I take recently upon choosing a career in engineering.
        
        I choose not to post the itinerary of the trip here but in case you need mine for the referral purposes, you could drop a mail and I'd happily send it to you.
        
        Let me put this out there, I was scared for taking this trip. Yes, I was extremely scared and worried when we were putting the plans for this trip into execution. This was due to 2 reasons:- 1. I was going to be traveling with my family i.e. my mom and dad. Both age over 50 and that just added more to the worried feeling. 2. The whole region runs under a limited amount of oxygen supply which may lead to various health issues and troubles like altitude sickness and so on. I have heard stories about how a place like Leh-Ladakh ends up being a risky destination to travel.
        
        But I do not want any of you to repeat the mistake I did. Do not go visiting and holidaying around Leh thinking something wrong will happen. This just puts unnecessary and tremendous pressure of your thinking and more wholely your brain. Make sure you carry all the medicines that have been prescribed to you and take care that you consume them at their appropriate time. Apart from all this, the tablet Diamox helps well in cases of altitude sickness but do take it as prescribed by your physician only. Diamox may lead to loss of electrolytes in your body and in order to avoid that you may be advised Potklor also. Carry an ample amount of sunscreen and lotion with you because the skin is bound to dry up in such cold weather. Lastly, DO NOT FORGET YOUR LIP BALM. Irrespective of the gender you belong to, a mild and long lasting lip balm will go a long way in protecting your lips from drying up.
        
        
        The connectivity is pretty low there and in most cases not even possible. Only postpaid sim cards of operators like Jio, Airtel and BSNL work there. So make sure you inform your peers about your disconnectivity well in advance. Take a good book along with you because there is nothing as peaceful as reading good words while sitting amidst the snow-clad mountains and sipping from a cup of hot coffee.
        
        The trip was special to me not only because Ladakh is extremely beautiful and has mesmerizing views but because I could disconnect and connect with nature, the valleys, the mountains, the rivers. I played cards with maa-baba almost after I don't even recall how many years. I slept early around 10 and woke up around 6 only to be staring at these beautiful views forever. We played carrom and I guess that is the first time I have ever played carrom with my dad. Well, obviously I lost and also bled my finger but the memory is going to last for so long.
        
        The Pangong lake, the Nubra valley, the monasteries and the palaces, all of them are beautiful but they only become mesmerizing when you see them with your own naked eyes and not just through someone's pictures. Pangong Lake changes colors in probably each minute and you are lucky if you could even witness a bit out of it. The camels of Hunder in Nubra valley have two humps and are extremely strong enough as they could carry me and roam along. The monasteries made me fall in love with Buddhism each moment a time and I learned so much more about Buddhism from the person who was chosen to escort us from one destination to another. The name of the person is Mr. Jigmet and again I'd happily give you his contact details if you mail me regarding the same. He is a gem of a person and I cannot say this with any more confidence that he made sure we had a safe trip to Ladakh.
        
        Lastly, I saw so much of the Indian army there. The respect I had for each one of the instantly doubled up. I wanted to visit the Siachen Glacier but I don't think that is a possible thing for me. A huge, huge amount of respect and a big salute to the jawans who stand tall to protect us in heat, snow, water and height. We do not know what we would have done without you.
        
        You may not always mandatorily need the oxygen but do buy the cylinders on rent for the days when you are visiting Nubra and Pangong via Khardungla and Changla pass respectively.
        
        I plan on posting the Ladakh vlog on a YouTube channel.",
        "type" => "3",
        "published_on" => "2020-01-17",
        "is_published" => "1",
        "is_deleted" => "0"
    ],
    [
        "title" => "Healing",
        "blogger_id" => "4",
        "image" => "4.jpg",
        "content" => "It is not easy, it will never be. Each wound caused to you comes along with a certain amount of pain, a certain amount of tears too probably. Each wound caused to you, be it internal or external, is an outcome of things not going the way they were planned to go. Each scratch is a memory of how hurt you were when it happened. The worst part of these wounds is the fact that they don't disappear easily. THEY STAY. They make you realize each time as to how you got hurt the last time and why you shouldn't repeat the same thing again.

        But shall we stop? Shall we cease doing whatever caused us the wound? Can you stop eating pieces of vegetables and start eating them as a whole just because the last time you held the knife it hurt?
        No, right. Similarly, you cannot stop trusting someone because it hurt you the last time you did.
        
        However, as you age, you realize that you cannot stop yourself from getting wounded completely ever. The only thing you can control and have power over is the process or procedure of how you choose to heal that wound. Let me just get you a bit nostalgic here, remember those days when each time you'd hurt yourself as a child from just falling off the swing or having some scars on your knees by brushing them against the ground while chasing your friends who kept running? Do you also remember how your mamma would just clean that wound and sanitize it by applying some antibacterial liquid while it'd burn so she'd also pretend to blow some air onto that wound?
        
        This exact same thing is what you do each time you are wounded. You take care of it in order to heal. You take care of all the external, visible wounds like your mamma used to but what about those wounds which aren't visible to the naked eye? You take extra effort, extra care. You give it time to heal but you don't neglect it completely either. You take out time for it. You take care of it by treating it with the best you got - maybe your favorite song, favorite dish, favorite movie, favorite ice cream or any other favorites. Even if that doesn't heal you, you could treat yourself with something adventurous like a solo trip or trying out the spiciest dish you were always scared to or doing something which gives your adrenaline a rush. Your inner wounds would always be the hardest and would require most of your efforts to heal. But they'll also lessen up by the simplest things like taking a short trip, getting things done, cleaning your wardrobe, meeting an old friend.
        
        Days later you'd realize that you are healing or have healed when the thought of fear won't grip you while you opt to do the same thing which caused you pain before. You come out braver and stronger and that's when you know YOU'VE HEALED.",
        "type" => "4",
        "published_on" => "2020-01-07",
        "is_published" => "1",
        "is_deleted" => "0"
    ],
    [
        "title" => "Gestures - volumes they speak",
        "blogger_id" => "5",
        "image" => "5.jpg",
        "content" => "Hello, hi, Namaste... Finally a month into 2019 and it is still taking me a lot of time for the reality that its a new year now to set in. This is going to be the first post of 2019 on this blog. Hence, I thought why not stick to the roots behind this blog or maybe dig deeper into the roots too.

        See the main motive behind posting all the blogs has always been to make the world a better place and to stop it from turning into an eye for an eye place. Right now, we are going to talking about how big, influencing role gestures play in our lives and why gestures are essential in our current living space.
        
        I am an introvert and being one, I find it really hard to talk to people I haven't been on recent terms with. Worse, I have always felt like I am at a loss of words regardless of the situations. This is where using gestures comes up as a boon for me.
        
        Gestures are those words which I never even have to utter but the message is sent. You see that security person sitting near the gate of your building each day, opening and closing the gates for your cars, performing some minor chores for you. You ever think the need to express your gratitude towards him; just smile and tell him . Trust me, this might not add or debit anything from your day but it would add a good memory in his. The sense of being appreciated would make him glee.  The same is accountable for your liftman, washerman, maid or anyone else who provides some basic service to you.
        The next good use of gestures is when it comes to friendships and relationships. You see a friend walking towards you but its been a long time and you are in a hurry. Just wave at them from a distance and show them your watch indicating that you are getting late. You'd save yourself from minutes of thinking about topics to talk on and the other person won't even feel neglected. You go to your friends saying 
        
         Things would be so easier if we SHOW what we mean rather than SAYING what we mean.
        
        You have that special person in your life whom you'd hate to lose. Just hug that person whenever you meet them and let them know how afraid you are of losing them. Hold their hand whenever they are in doubt or fear or maybe just sad. Call them up and ask them how their day is been going. Give them something to laugh on when they say that work has been awful today. Staying together will always be harder than letting go but for once just give them a smile and assure them that you will do anything to make this work.
        
        Lastly, the people who need the most of your good gestures are your parents. They won't explicitly ask for your time or attention as you grow up but make it a point that you still give them your time. Wake up early of your day offs and have a little brunch with them. Help them buy stuff from the supermarket. Keep your phones off the dinner table. Make it a point to talk to them each for 10 minutes a day at least. Ask them how their HEALTH is.
        
        
        Every stranger you meet is like a new book you are yet to explore. You don't rip covers of the new book, right? You open it with a lot of carefulness and patience. Do the same with strangers. Use the good words",
        "type" => "5",
        "published_on" => "2020-01-01",
        "is_published" => "1",
        "is_deleted" => "0"
    ],
    [
        "title" => "The Diary Of A Clumsy Adult chapter 1",
        "blogger_id" => "6",
        "image" => "6.jpg",
        "content" => "This is again the start of something different and something extremely unique. The name as it states is completely inspired by ''' diary of a wimpy kid
        
        
        Chapter 1 ~ Bombay Darshan
        
        A huge part of my daily events are influenced by the fact that I have this weird habit of finding things and content in everything that I see or do. Being from Bombae since past 20 years a sense of exploring the city always keeps me up. so today we decided to do just that, we decided to explore some local food spaces in and around the Mumbai city. Needless to say, we took almost half a day to come up with a plan and it was already lunch time by then.
        We started this journey of exploring as though we were traveling bloggers by beginning with food! My good friend and an extremely huge foodie advised a local papad shop to me around Charni Road Station. It is situated along the same footpath as  in Charni Road nearby Charni Road Railway Station. The way in which the papad is garnished with all the ingredients is just mesmerizing. The best part about it is the fact that he adds aloo to the papad too :P
        Each bite of that papad dives into your soul just to give you a taste of satisfaction. No doubt the masala papad was spicy due to which we had to calm our tongues with the help of sugarcane juice available right opposite the 'Roxy Cinema'.",
        "type" => "6",
        "published_on" => "2019-12-31",
        "is_published" => "1",
        "is_deleted" => "0"
    ],
    [
        "title" => "Realizing What's More Important",
        "blogger_id" => "7",
        "image" => "7.jpg",
        "content" => "So in case you have been reading all my blogs till date, which I hope you would have, you might be aware that I pretty well ain't good with the introduction part and all.
        So cutting the chase because none of us have all the time in the world either for this.
        
        So a huge part of my daily schedule includes sitting on a couch like a potato, watching tv, scrolling through dozens of apps, having short-talks with people I call friends and simply procrastinating.
        Up till the last week, I was probably still doing the same until a lot of events happened in my life. These are not some major, grand events but little sequences which cumulatively made a big impact on me.
        So a part of my procrastinating chores include sitting glued to the tv and watching an extremely famous game show called KBC aka 'Kaun Banega Crorepati'.  I know you all might be wondering that who sees that show, it's monotonous too maybe. But there are two huge reasons why I watch it :
        1. Obviously Gk.
        2. You know where you stand and there is a world beyond your world.
        
        So the recent episode which guest starred, Sarbani Das Gupta accompanied by Ayushmann Khurana.
        The only one video which I'll be linking here was enough for everyone's heart to melt. The way Sarbani Ma'am describes a mentally affected person and the perception she has towards all of them makes you feel like you are missing a lot on life and the fact that the world needs you now more than it ever will.
        ",
        "type" => "7",
        "published_on" => "2019-12-26",
        "is_published" => "1",
        "is_deleted" => "0"
    ],
    [
        "title" => "Self Love?",
        "blogger_id" => "8",
        "image" => "8.jpg",
        "content" => "So I have been posting random post here and there on my Instagram handle about the topic ' self-love'.  (see how subtly I gave me a shoutout :p)
        I know many of you might be curious about what it actually indicates to? Why is it so important? Also, isn't self-love another subtle word for selfish?
        I hope I solve all of these and more.
        Self-love is not being selfish. It is another word for knowing your value may be. But definitely not being selfish. Self-love is accepting your flaws, your scars and wearing all of those like badges of honor on your sleeve. Self-love is knowing that you aren't perfect because no human being is meant to be and still being happy and content in your imperfections.
        
        You have to keep yourself a priority like you keep the someone special while you are 'taken'. You have to do all it takes, give your best shot, stay motivated, take care, dress up and do all of this for just one person. YOU!!!!
        
        
        Self-love is like being in a relationship where the only person you are dating is you. You need to have time for yourself, you need to have communication with you, you need to be connected with you.
        
        
        Gift yourself your time, energy and good vibes. See how comfortable and healing falling head-over-heels in love with yourself is.  Let me tell you this, once you feel how you should be treated, you won't settle for any less and that's when the right person hits you.
        
        Self-love is not just a feeling, it is a state of mind wherein you discover a new person in you each day and you learn to appreciate that side too.",
        "type" => "8",
        "published_on" => "2019-11-14",
        "is_published" => "1",
        "is_deleted" => "0"
    ],
    [
        "title" => "Evaluate a Human",
        "blogger_id" => "9",
        "image" => "9.jpg",
        "content" => "Another day where I just have some mundane ideas on this blog post which I have subtly posted under a witty title. Well, that's what I have been doing with every blog recently.

        Curiosity boost up? Thinking what evaluate means here? Am I distributing interview tips? Am I going to talk about how to make yourself worthy of passing an interview? Well, no.
        
        
        This is such a short and simple post related to one of the incidents I closely encountered with. By evaluating a human, I just happen to say that we realize the value of a human being pretty late. We realize their value mostly on their prayer meet by acknowledging them saying 'bahut ache admi the. Bhagawan ne jaldi upar bula liya.'  or probably when that person is on  their death bed , 'kaafi taklif ho rahi hai unhe. bhagwan aisi zindagi kisiko na de. itni taklif wo bhi itne bhale insaan ko.'
        
        
        I guess I am going to need a little help here as to why we start valuing or realizing the value of a person in our life this late? Are we crazy? Are we nuts that we realize the importance of something only after it is lost? I know that is human nature but can we at least try to change?
        
        
        Can we just acknowledge them while they are alive? Can we talk to them, praise them, make them aware of their shortcomings while they are breathing and releasing carbon dioxide?
        
        No, I am not saying I am a saint person or something similar. I made the same mistake, I still do maybe but the difference is while I am trying hard not to repeat it you are not even making an effort. I lost a lot of quality time with the person I cared for and I probably regret that too. Luckily, I have a second chance to make things right. You may not always have.
        
        Just spend some quality time with the people that matter to you, the people whose loss will be a great bolt to you, the people who you care for. Evaluate that human being based upon the time you have and the role they play in your life. I'm sure you'll realize how important everyone is.",
        "type" => "9",
        "published_on" => "2019-10-15",
        "is_published" => "1",
        "is_deleted" => "0"
    ],
    [
        "title" => "UnConditional LOVE?",
        "blogger_id" => "10",
        "image" => "10.jpg",
        "content" => "Why do we always feel this never-dying need for Happy Endings?
        Why do we always expect haan bhai, movie kaisi bhi ho end mai to hero-heroine ne saathme aana hi hai?
       Why do we always think that yes, we are going to have a happy-ending in our life too just like the dumb Bollywood movies?
        First, you do not know when the climax scene of your life is going to come and secondly, your life is not a Bollywood movie!
       We all have to make our mark. That is exactly the fuel that ignites in us the desire to do better each day. Then when it comes to love, why do we force ourselves to believe in something so pure just by the looks of it in the movies or the books? Those things are fictional. I mean, you may or may not fall in love at first sight. You may find someone attractive years later and your first meet can be an intense argument. Why are you forcing yourself or expecting that your first year of college is exactly when you are supposed to meet your better-half and that’s that! It is not necessary! Love is not measured by days, my friend!!! You can fall for someone yesterday and marry him today. It is okay.
       But this one is not about that, this one is about the love stories that did not have a happy ending. We have all dated someone or the other or maybe are waiting for the perfect person to come along. We may have ended on a good note with our exes or maybe we still feel the urge to stab them in the back. This post is not about that either.
       
       But my friend, what if you fall in love in the most unfavourable times with the least expected person? What do you do then? Say that it was not love?
       No! Not every love is meant to be pursued my dear! Not every love story is meant for a happy ending! Not every love ends with ‘happily ever after’! But when these things don’t happen; why do we start doubting love? Maybe their love was not pure? Maybe they were just infatuated? Maybe you were blind for each other? Stop calling it names!!! The two people who existed in that story know what they shared and why they could not have a happy ending.
       
       Lets suppose! You are above 30 and still not in a successful marriage and then you find this adorable lady who is just a visitor in your country and you spend happy 15 days with her after which she goes back and never returns. So are those good days worthless? You felt love in the purest form it could exist, still you could not make it yours forever, and you end up feeling guilty.
       
       This is what is wrong with us. We keep on forgetting that our life is not a movie or a novel with a destined happy-ending. We forget that not every love story is meant to be consummated. Not every story  is meant to be true. Not every person you develop feelings for is going to be your ‘happily ever after’.
       
       I think it is time we stop calling ‘love’ bad faith just because it couldn’t last forever. Be happy that you had this encounter with love and for all those good memories it left you with. Those are the days you live for.
       
       Also, I forgot greeting you guys before so heyyyy!!! Fall in love and break your hearts! Because feeling something so pure just doesn’t happen that easily.x
       ",
        "type" => "10",
        "published_on" => "2019-09-16",
        "is_published" => "1",
        "is_deleted" => "0"
    ],
    [
        "title" => "What was the third thing off my BucketList?",
        "blogger_id" => "1",
        "image" => "1.jpg",
        "content" => "Long time no see :P
        Once again, a hello from the other side by an extremely lazy-ass blogger!!!!
        We all have BucketLists, something we always wish to do! The main motto of our lives revolves around adding a +1 to that list while simultaneously crossing off the other.
        
        So now what was the third thing on my Bucket List and why did I take to blogger to share it out?
        
        Toh Boss Funda ekdum simple hai.. Jo humne kiya wo humare liye mushkil tha aur bas hume apko bhi batana hai.
        
        The third thing in the list was simply going to a busy resto alone and eating out without calling someone or scrolling through the Instagram feed.
        
        Yes, it takes immense gutts to walk-in in the first place followed by people's eyes around you expecting someone with you!
        All they do is stare and stare and next tough task is ordering for the food. If it is a proper restaurant then no issues but what if it self-served plaace? You have to make sure your seat is reserved and also go and order. Now thats a tough task buddy!
        
        And finally, eating while looking on the table next to you and making sure you don't seem as a desparate spy to them. That thing right there mister is a hard one!
        
        
        The experience all-in-all was good. it makes you feel independent and stuff but it does suck when you have to gobble down all your food alone so that you don't feel lonely nor people think that there is something wrong with you!!
        
        Try this one task and see how comfortable solitude can be!
        
        Once you fall in love with your solitude, you would never wish to cheat on it again.
        
        
        
        
        So I just want to make sure you add this to your Bucket List too!
        
        
        Grabbing some more foooodddd,
        Good Luck .x",
        "type" => "11",
        "published_on" => "2019-08-08",
        "is_published" => "1",
        "is_deleted" => "0"
    ],
    [
        "title" => "The Lost Gandhi",
        "blogger_id" => "2",
        "image" => "2.jpg",
        "content" => "If you follow me on Instagram or snapchat and had seen my story last week, you probably know what this blog is about. Yet, I guess you should keep reading as this won't disappoint.
        To begin with, if you are a fan of the independence period or if you are a strong believer in the 'Mahatma', this one is for you. 
        There is a little-known place called,'Mani Bhuvan' in Mumbai. It is located in near proximity of the Grant Road station. You could google rest of the details here.
        Before we begin, let me tell you all why this place is really close to my heart.
        As a child or somewhere in the process of growing up, this place played a vital role in shaping me into a better human being. This is the place where we bid a strong goodbye to my stage fear and also discovered that I had some average speaking skills which are lost somewhere these days! Ghosh, I miss the stage now! But yes, this is where I learnt how you address a good audience and how you keep them interested throughout your session. However, that all is secondary, this place helped me know the 'Mahatma' in a way none of my history textbooks could help me know him. Also, a big thank you to my teachers who made me realize the existence of this place.
        I visited this place last week after a long gap. The gap might be of above 5-6 years and that's when I realized how much better I was as a child rather than now but situations change us right? Let's leave that for another blog post.
        
        MANI BHUVAN
        It is the place where Gandhiji stayed every time he was at Mumbai. A little two-storeyed building on a quiet, peaceful road is where he would come and reside while planning for the major battles he was to face in life ahead for the freedom struggle. Imagine if that place could motivate the Mahatma so much, what magic would it have on you!!
        This place is now open to all the visitors for informational and educational purposes. Also, worry not, the entry is free!
        Housing a library on the ground floor followed by the staircases covered with pictures or moments of Gandhi's life and two big hallways kept for competitional reasons - is a mere description of this place.
        The final second floor houses a museum depicting Mahatma's life in the most interesting way possible. The floor also contains Mahatma's room and his basic daily life necessities.
        If you are in Mumbai (or Bombay as I prefer calling it), do visit this beautiful, motivational, inspirational place and trust me it will not disappoint you. Also, it will take hardly 30-40 minutes to visit this place fully and for what its worth, it housed the same person who is printed on every currency note.
        Attaching pictures and some videos from my last trip there, hope they are attractive enough.",
        "type" => "12",
        "published_on" => "2019-07-21",
        "is_published" => "1",
        "is_deleted" => "0"
    ],
    [
        "title" => "RAPE and RELIGION!",
        "blogger_id" => "3",
        "image" => "3.jpg",
        "content" => "So I guess a lot of you all would have already noticed people posting stories, tweeting, sharing stuff under the #JusticeForAsifa, let's get to the basics about this hashtag, shall we?

        The little 8-year-old girl was held captivated, drugged, gang-raped, injured, stabbed and succumbed to facial injuries and for what? because she was a Muslim or because she was a girl?
        As a developing nation, it scares me! People having such mentality, possessing this blind spiritual faith in such anti-religious theories which eventually make them believe whatever they did was to prove that their religion is superior to the other religions!!!!
        How dumb are we that we fail to notice the truth that we are born humans and the only religion we are going to die with is HUMANITY.
        God does not check or bother about your religion after you die; he bothers about what you do with the help of your humanity now.
        The Kathua and the Unnao case speaks tonnes about everything that is wrong with this country right now.
        A 16-year-old raped, gathered the guts to voice out and eventually led to the death of her own father who was beaten up by the accused rapist and his men. I guess she should have shut up right?At least she would have had her father alive.
        
        The family of Asifa left the house after hearing the news of their daughter's death. Why?Because that is the amount of terror we create in the name of religion.
        You might have also come across a lot of posts with the #NameAndShameThem. Do share those photos because if we cannot punish the rapists as a country we can at least shame them as normal citizens and make them feel guilty and as horrible as the girls would have felt when those a*****les touched them, harassed them not once but multiple times!",
        "type" => "13",
        "published_on" => "2019-06-07",
        "is_published" => "1",
        "is_deleted" => "0"
    ],
    [
        "title" => "Attention Please!",
        "blogger_id" => "4",
        "image" => "4.jpg",
        "content" => "Hello everyone!
        This is just a quick post as a call for help!
        
        
        In case you stay at matunga CR or have visited the matunga CR railyway station ever in your life, you might have come across a very small temple right next to the ticket counter.
        Well, the temple is Karpaga Vinayagar Temple and is currently going through the threat of being under the knife.
        
        
        
        
        The above banner is put up right outside the temple pointing to the fact that without the rightful evidence it shall be demolished.
        Now, to the question : What can we do and why this post?
        
        Any piece of evidence, a photo, any document, any little tiny piece of proof which points to the existence of Kargapa Vinayagar Temple can turn helpful.
        Also, if you are a senior citizen or you know a senior citizen residing at Matunga since long time,you could also help.
        All that is needed is an Aadhaar card xerox self attested i.e. with their signature and a self-declaration stating that they know the temple has been there since whatever year they have seen it. You could hand it over to the temple staff at Kargapa Vinayagar Temple.
        
        THIS IS A CALL FOR HELP!
        As a citizen, PLEASE DO YOUR BIT and PREVENT THE DEMOLITION!!!
        
        Also please share or spread this to everyone you know is somewhere related to Matunga CR.
        
        
        Thank You for your efforts and time,
        Aarvi :)",
        "type" => "1",
        "published_on" => "2019-05-29",
        "is_published" => "1",
        "is_deleted" => "0"
    ],
    [
        "title" => "Anecdote!",
        "blogger_id" => "5",
        "image" => "5.jpg",
        "content" => "Hey You!
        You who just surfaced another day in your life, I am glad you are here.
        Cutting the chase, this blog post is a personal experience for me and I learned something from it. I hope you do too.
        
        
        I was having just another Monday but also it was a good one since it was a day off. It goes like this: I lost one of my syllabus related notes and ended up borrowing one from my friend in order to make a copy of it for me. Then this complete random stranger came and stood right next to me at the shop waiting for his errands to get done. That's when he just had a glimpse of the notes that I was about to make a copy of. He started talking with respect to the contents written on the notes. Trust me, he had so much glitter in his eyes which held this crazy passion for engineering(yes, I currently pursue a degree in engineering). I didn't know his name or had no clue about where he belonged from but then I just ended up having a good, long 15 minutes discussion about all the knowledge that he had to share with me regarding the notes I held. Owing to the fact that I have this big, curious mind, I noticed him in an outfit which was generally worn by the salesman of a jewellery shop in my area and I ended up asking him, To which he humbly replied, A part of me broke upon hearing this. Yes, I am this highly-sensitive person and I  want to become ends up being that because they were forced to breaks you, right?
        
        
        Everyone deserves to be something that they dreamt to become but they because of the circumstances; please help!!! You are made a human to do and take favours.",
        "type" => "2",
        "published_on" => "2019-04-18",
        "is_published" => "1",
        "is_deleted" => "0"
    ],
    [
        "title" => "Unsaid Words",
        "blogger_id" => "6",
        "image" => "6.jpg",
        "content" => "You weren't there for her when she needed you,
        You weren't her shoulder to cry on when one of those fuckboys pretended to care for her only to leave her more broken or shattered later,
        You weren't there for her when she was learning her first word or her first bike,
        You weren't there for her when she was just about to blow her candle for the midnight wish on her birthday when all she wished was for you to magically appear out of nowhere for her,
        You weren't there when she needed help while distinguishing between who wants her love and who wants her lust,
        But yes you were there for her when you needed her to help you with your errands,
        You were there for scolding her for scoring low or for doubting her while she made the most important choices in her life,
        Thanks for not bringing her a goodie when every time you were away from home for a few days.
        Thanks for not treating her as a doll and letting her know that 'Men always break hearts and not bones'.
        Thanks for being her biological father but not being able to be one logically.
        Thank you for everything which should have done but yet you didn't.
        Lastly, gracias for letting her know that out of the different kinds of guys she can marry, your type is not the one she should be looking for daddy!
        
        
        
        
        
        Giving a try to the new unsaid words series.
        Do let me know how you feel about it :)
        Gracias!",
        "type" => "3",
        "published_on" => "2019-03-12",
        "is_published" => "1",
        "is_deleted" => "0"
    ],
    [
        "title" => "D.E.A.T.H",
        "blogger_id" => "7",
        "image" => "7.jpg",
        "content" => "This post is wonderful isn’t it?
        But what we don’t get is, Do we die of causes and reasons and prolonged illnesses? Or we just choose to surrender to all of them and then just lay there until death comes to us.
        It is easy for us to say that we don’t want to live anymore or we have no reason to live anymore.
        But have you ever seen a person who wants to live, wants to jump up, wants to laugh till it hurts in their tummy, wants to eat their favourite dish at that one particular restaurant because it has so many memories attached to them but they just can’t do all of that because off their long-term bedridden illness.
        
        We don’t decide how we die or where we die or when we die. Imagine this though; you are in your octogenarian years, idly laying and shitting in your bed while wearing some adult diapers and waiting for death to hit you up so that you have to stare at the same ceiling anymore while seeing your whole life in front of your eyes with all the ifs-buts and the had I/had I nots…
        
        FACISNATING ENOUGH?
        
        You choose what you want to do with your life.
        You choose whether you want to sleep on your sick bed with regret in your life or with the feeling that you did all you wished for, you took every risk you wanted to and then smile with no teeth in your mouth (because you’ll prolly have dentures by then) and a feeling hinting you that
        YOU MADE IT! 
        Moreover, all you are left with is those happy times and notorious actions which you made.
        
        
        HUSTLE WHILE YOU AREN’T DEAD
        AND HUSTLE FOR YOUR HAPPINESS
        NOT SOMEONE ELSE’S COMFORT
        SO
        YOU CAN ATLEAST FLATTER YOURSELF
        WITH SOME ENTERTAINTMENT ON YOUR SICK BED OF ROSES.
        
        
        Thank You for checking up posts like these,
        subscribe with your emailid  so you get notified everytime I post something up here.
        Liked it give it a +1
        Share it with your favourites
        
        Stay tuned for more !",
        "type" => "4",
        "published_on" => "2019-02-14",
        "is_published" => "1",
        "is_deleted" => "0"
    ],
    [
        "title" => "#HappyWorldMentalHealthDay",
        "blogger_id" => "8",
        "image" => "8.jpg",
        "content" => "In case people call you already, you really don't need to continue scrolling down this post as your mental health is the best it could be.
        For those of you who are the exact opposite of , read it. Spend five minutes of your valuable time reading this. I guess you won't regret.
        While everyone around you is posting about #WorldMentalHealthDay, get this straight to your mind.
        
        Mental Health is important.
        Mental Trauma is worse than any health disorder.
        Your body doesn't worsen but your thoughts start getting ill.
        Don't deteriorate your mental health for anyone.
        IF IT WON'T MATTER FIVE YEARS LATER, DON'T SPEND EVEN FIVE SECONDS THINKING ABOUT IT.
        
        Yes, that's the golden rule.
        Do what makes you happy?No. Do what gives your mind the peace it always keeps looking for while it wanders to long empty road trips amidst a crowded local train.
        
        
        And as I always quote, in case you have anything, let that thing be as little as a pea under 20 bed-sheets like the ones in princess and the pea, share it out. LOUD.
        
        
        
        
        Even you feel, there is no one to hear you, its okay! You just expelled the negativity out of you!
        And if you are looking for someone to talk to and the therapists cost you and make you look like a patient or you are running out of people lending you ears, mail me vidhiparikh28@gmail.com and say your heart out. I may not be able to solve your problems completely but you may feel good about someone lending an ear to you!
        
        
        Listen to the song that gets your mood set.
        Do what gives you the joy of being alive.
        Go out with people who make you feel alive.
        Do what it takes for your heart to end up saying 
        Until then, don't stop! Nobody takes you down until you aka your mind allows them to.
        
        #HappyWorldMentalHealthDay! xx",
        "type" => "5",
        "published_on" => "2019-01-15",
        "is_published" => "1",
        "is_deleted" => "0"
    ],
    [
        "title" => "Why Being Independent Is Not Being Lonely?",
        "blogger_id" => "9",
        "image" => "9.jpg",
        "content" => "Hellooo..everyone out there who just opened this link to check whether its working or not :P
        Yes, it works absolutely fine and yes, I am still posting blogs,lazily but yes.
        
        Of late we haven't yet discussed something or I haven't shared any of my stories in here so I thought today would be the day I should get done with.
        Lets get started...
        
        With so many changes occurring in your life, you tend to do things your way and maybe there are times when you are the sole person who is doing things your way, making you separate or different from the rest of the people and trust me there is this thin line of difference between being the sole person who walks on your way and being the lone person who is just walking.
        
        When you are walking on your way, you are responsible for all the events that will be happening to you henceforth and you are aware of the consequences which gets your more determined whereas if your are just walking like a lone person with no direction or company, the road will eventually turn boring, you'll start missing people on your way, you'll have this urge to change your way just because that way has people who you'll be calling. The same people, who are like you, who have no idea where they are heading to and what they are up-to.
        
        
        Worry not, I know the above words are as confusing as a mirror maze in an amusement park.
        Lets get to a short story for that, until recently, I had some major changes in my life, changed my high school and just when you are an introvert, its hard to make friends and stuff. Well, the same happened and then this feeling of being lonely crept in. I wanted to quit social media, cut off ties with people I know and just lock myself up in a room and stay silent for hours. But then this big thing dawned upon me, the fact that the destination where I am heading to is all worth going through these feelings and the fact that I  am turning independent and not lonely. I am learning to be my own soulmate, my own favourite company,my own lending ear and my own bear-hugger. This realisation was all it was needed to get me that kickstart which has now led to me to write up this blog post for you.",
        "type" => "6",
        "published_on" => "2018-12-30",
        "is_published" => "1",
        "is_deleted" => "0"
    ],
    [
        "title" => "Spirituality At Its Best",
        "blogger_id" => "10",
        "image" => "10.jpg",
        "content" => "Hey! If you are someone with those typical ‘XY’ chromosomes & if you always have this never-ending, urge to satisfy yourself, which sadly, you cannot do on your own, then this little piece of advice is for you!
        Yes, you are adult enough to have proper ways to get your urge satisfied but that would probably cost you money, wouldn’t it?
        So I have this simple, easy and sober trick for you!
        Pack your bags and just rush to India.
        Now you are probably thinking why I said that...I have reasons.
        
        
        Dress up like a saint. Tell people you are least interested in women. Make people believe in the shittiest of your philosophies and then bam! You will be having followers. Followers who would cross any limits blindly for you.
        Instagram followers is now a yesterday thing. People should find followers who could burn cities for them.
        
        Get yourself satisfied by the females who respect you as devotees respect God.
        Moreover, worry not the judicial system would take years to convict you even if you are guilty.
        Now that you know who I am talking about let’s get to business.
        Just draping around an orange piece of cloth does not make you a saint, your mentality does.
        Just blindly following a person who himself has no clue about what he is preaching is stupid.
        Raping women thinking that it is your moral right to fool them by pretending to be God sent messenger to purify them is exactly a devil’s thing.
        And all the RRS followers, how crazy are you? Okay! The next thing you would do is track me down and kill me maybe.
        Burning vehicles, towns, cities for this one person, you blindly follow. How does your faith make you kill those 31 or more innocent people who had nothing to do with your baba or you? The only mistake they made was stay in Panchkula and this is how they pay for it?
        
        Why do we even support a person who has raped and murdered people? The court is pretty late but moving at a good speed on RRS case. But now the criminal (OH wait! Calling him a criminal would disrespect the rest of them)! a rapist is moved to a special jail, gets special treatment. There is a curfew like situation all over Punjab & Haryana state. The armed forces are called in order to take control. Bhaiya! Itna special treatment to humne bahaaarse aaye terrorist ko bhi nai diya. Ye to apna hai!",
        "type" => "7",
        "published_on" => "2018-12-15",
        "is_published" => "1",
        "is_deleted" => "0"
    ]
];

$moreData = [
    [
        "title" => "Parenting? You maybe committing this mistake.",
        "blogger_id" => "1",
        "image" => "22.jpg",
        "content" => "Hello everyone and hope you are having a good pleasant day and loads of positive wishes and stuff to you. So lets just cut the chase and jumping right to the main topic. This post is going to let you know a little thing that every parent tends to do and the reason why it is wrong.
        We all know or have experienced how much joy the feeling of parenting a child gets. The never ending desire of being there always for them and getting them everything they wish to have in their dreams. The parents feel that its their duty to get them the stuff every stereotype girl or guy should have. Like if you have a baby boy, you give them the stuffed animals and maybe some cars or rubber balls but if she’s a girl you would get her dolls and tea sets and all the typical girly stuff.Well that all is acceptable but in the end you end up getting her fairy tales which is something horribly wrong!
        Yes, I am a girl and my big,thick book of fairy tales was ,is and will always be something very, very dear to my heart! I haven’t yet thought or tried to discard it no matter even if I have turned into an adult. Yes, girls love fairy tales and parents do end up getting their adorable sweethearts that book.
        Here’s why girls love it and why that’s the wrong thing parents do –
        
        
        ·         When you give her the book you start making her believe in happily ever after which in reality never ever happens.
        ·         You start moulding her to think that the step mothers are always cruel which they generally aren’t ever.
        ·         You make her feel that there is going to be a fairy god mother turning up at her door and granting all of her wishes which we all know that don’t exist.
        ·         You make her think that she has to be good and kind to everyone and bear with all the shit which people around throw at her so that she ends up turning an ideal daughter. But seriously should we take crap from people or give up a taste of our own?
        ·         You teach her that there is going to be that one prince charming who would hit up on her doors on a white horse, kiss her and take her away into his own magical kingdom. Well magical kingdoms in 21st century?
        ·         You make her believe that evil exists but in black clothes with a dark, shabby makeup and a glossy dark lipstick. But don’t females generally end up getting ready the same way for parties?
        ·         And you make guys presume that they are superior to their female counterparts, that they are braver, bolder and are the sole bread-earners. Aren’t they supposed to know the truth that there is no superiority but just mutual co-existence?
        
        Read them stories which make them get in terms with reality!
        Read them stories which makes them independent but not superior!
        Read them stories which increases their confidence and boosts their morale and not just makes them think that they would end up in a house sewing clothes and washing utensils until prince charming swoops up.
        Read them stories of women which would inspire them and which did happen ‘once upon a time’ and not just some cooked up imagination.",
        "type" => "8",
        "published_on" => "2018-11-55",
        "is_published" => "1",
        "is_deleted" => "0"
    ],
    [
        "title" => "Fearless!",
        "blogger_id" => "2",
        "image" => "23.jpg",
        "content" => "I guess you guys know me quite well!! Or many of you might have even forgotten me because its been 5 years since I was in the headlines of all the local and national newpapers.
        These five years have been so nice and its so soothing up here when you know there are people down there fighting and shouting their voices out specially for you.
        Okay, since it seems that you don’t remember me well enough! I’ll take you all for a flashback and tell you my story which probably the newspapers and Wikipedia might have already told you! Five years back and a shiver down my spine!
        I am a girl! Yes, I was born in this big, kind family where each individual of family loved me and I loved them back. I was Daddy’s girl ( Well every girl is but I wasn’t my daddy’s burden. I was more of his pride). I always admired the way my dad was so hardworking just to get my brothers and me a proper schooling. He worked two shifts in a day just to earn more and get us educated. He never needed to do that. He could have easily let me off and made me sit home and get me married. Why dad? Why did you even work so hard for me when I was going to get on with the dust?
        I never let my dad’s hard work go worthless. I tried my best to make through school and give him satisfactory results. We were all a very happy family. I was career-oriented. I loved physiotherapy as if it were the only good profession on earth and I wanted to excel it. I wanted to give it all back to my dad. I wanted to make him realize that every drop of sweat he has shed for us is all going to bear him sweet fruits in the near future. It was all going good and well I was a normal Indian girl. You know how we are, right? We love decking up, cooking, going that extra mile for someone who means a lot to you, watching movies (both Bollywood and Hollywood), and hanging out with friends and our never ending desires for sneaking home late at night. As it seems, I was no different. I loved every bit of all of it!
        We all plan movies with friends and who am I kidding? I was 23 back then. I was independent and mature and I could take good decisions is what I felt. Nevertheless, that day I did make a bad decision. I chose to go for a movie with my friend and I turned my life upside down as if it were a rollercoaster!
        I stayed in the big, metropolitan city of India but I made such a horrible decision. I chose to watch a movie which began at 6 in the evening which was supposed to end by 9 and I was supposed to continue my journey home with my best friend and reach my home safe home at 10. What a bad decision right? I chose to stay out after 8. What was I even doing? Had I gone insane? Yes, I know these are your thoughts. I just wished I would have thought that same thing and concluded on staying up at home watch a boring television show and sleeping. Had I just done that, I would have been with you still. I would have been successful. My brothers would have got married. I would have had a big, fat wedding and would be planning my kids with my someone special but as they say one bad decision and it all goes away.
        And it happened, I was just minutes away from the most dreadful part of my life. It was 9 pm. The movie was over and I was suppose to head back home with my friend. However, sigh, we couldn’t find a good mode of transport that day to drop us home.  We were walking on the way and there it happened we found a bus with 6 men including the driver heading towards the same route as our destination. I pleaded my friend to board this bus even though he was reluctant and trust me this was THE WORST DECISION OF MY LIFE AND ALSO THE LAST DECISION I ever made.
        That bus ride changed me forever. I cannot even forget how it all happened! The bus changed its route and they shut the doors of the bus. When my friend questioned, they rounded around him and started beating him badly. They took me to the rear end of the bus even though I cried aloud and shouted as hard as I could. But NOBODY HEARD. They beat my friend so much; he could hardly stand up and cry! This was the beginning of something so horrible and devastating. This was the beginning of a woman’s cries being feeble in front off 6 horrible monsters called men. They touched me everywhere and anywhere. Those harsh hands were all over me. That touches made me regret about being conscious and alive. But those touches were not the end, I was tortured and it was brutal. You can imagine how hard a finger down there is right? Well an iron rod is almost 100 times more painful than that, leaving all your genitals crushed. At that moment, I regretted being a girl more than anything in my life!",
        "type" => "9",
        "published_on" => "2018-12-28",
        "is_published" => "1",
        "is_deleted" => "0"
    ],
    [
        "title" => "Equal Rights?",
        "blogger_id" => "3",
        "image" => "24.jpg",
        "content" => "
        We live in a country where The Constitution guarantees equal rights for all the citizens but when it comes to putting these laws into reality - WE SUCK.
        Yes, we do suck. I mean, in a world where people are only bothered about feminism and male chauvinism, we conveniently forget that there are issues more significant than these.
        There are issues dealing with those silent souls present in the non-human animals and elements.
        There are issues in treating people who are neither feminists nor possessing male ego.
        The Transgenders <3
        (Yes, many of you refers to them as chakkas! which is gross💢)
        
        
        
        
        I know many of you wouldn't even wish to continue reading this anymore after seeing the image; those who do, you still have a golden heart. We treat transgenders so badly, we treat them worse. Moreover, we spoil their name by giving them names.How effortlessly we speak,Kya chakke ki tarah taali baja raha hai? And I still wonder WHY? Why do we have to compare our claps to anybody!
        Why do we even have to spoil anybody's choice of living?
        Why do we turn our faces over anytime we encounter a eunuch?
        We would not feel good if somebody did the same to us right?
        Imagine yourself walking on a crowded dadar bridge and people turning away from you just because you are different.
        Imagine people giving your name as a substitute of being weak,different and disabled.
        It was horrifying, wasn't it?
        
        
        Yes, I am no saint person and nor have these thoughts come just by sitting idly and pondering. This struck to my mind right when I was scrolling through my Facebook NewsFeed and there lay a beautiful video which made me teary. Wait, you can view it too.
        
        
        No doubt, I love the makers of this video just for coming up with such an amazing idea. You guys are amazing. Yes, #TouchOfCare is a must for everybody everywhere.
        But what is more important is The concept of Equal Rights should not remain just restricted to our Constitution(Just because it depicts Mera Bharat Mahan). Let the concept be in our thoughts and in our deeds.
        Vicks India has already initiated a step. What are you waiting for?",
        "type" => "10",
        "published_on" => "2018-03-05",
        "is_published" => "1",
        "is_deleted" => "0"
    ],
    [
        "title" => "Its Okay!",
        "blogger_id" => "4",
        "image" => "25.jpg",
        "content" => "its okay not to be okay


        Hello everybody and I have no clue how many of you opened up this link and are actually reading it instead of scrolling it down. If you are still reading this - hey there mate! its an honour to have you here.
        
        I know life is not always a bed of roses, it has thorns too!
        And incase you feel like you are walking on a path full of thorns and its hurting then trust me you can actually take a break and ask for some help from someone.
        While a lot of you may still be thinking what i am talking about? worry not im still here.
        
        Life seems good when it is all lit but in the dark times we all secretly, silently crave for a company. We want someone to be incharge of our back. We want someone just to be there and lend an ear. Yes,we may not admit to the fact that we need someone to reach out to us. We may deny that we are weak and we feel we can go through this alone.
        
        
        but shh here's a secret :-
        
        its okay not to be okay!
        its okay to admit that your life is dark!
        its okay to admit that you need a companion!
        
        And trust me, your life would get more easier, convenient if you voice your soul out instead of locking it all in.
        You may think that you are mature enough to handle this single handedly and that it is pretty stupid to share this with anyone but its more mature to share it with that one,single person because that makes you stronger.
        Your body has a limited space for storing and handling all your lows.
        At the same instance, if you trust somebody enough to share your soul with them it gives you two advantages
        1. it teaches you how to trust and whom to trust
        2. it teaches you how to be stronger and stay bold even if somebody tried to breach your trust.
        
        
        And in case you dont find anybody to share your lows with, you can always,always contact us at our social handles below -
        
        
        
        
        
        
        So the next time you feel a thorn or a low phase in your life, just tell your heart its okay not to be okay! you cannot be happy always!
        Find a companion, a person, a pet, an imaginary character but the base line stays find someone to share your load.
        
        signing off,
        vodafone(happy to help :P)
        *i-know-thats-a-bad-pun*
        
        
        okay, we at D Imperfectionist are ready for a new challenge.
        Well, here it is - we want you all to comment down and random topic below and we would give it a shot to write something, to compose something soothing on that subject.
        Incase you like reading us and want to read more, shoot your topics below :)",
        "type" => "12",
        "published_on" => "2018-06-05",
        "is_published" => "1",
        "is_deleted" => "0"
    ],
    [
        "title" => "18-ohh-freak",
        "blogger_id" => "5",
        "image" => "26.jpg",
        "content" => "Hii guys!!!!!!!!!!!!!! Wassup and welcome back to the most teen friendly blog D Imperfectionist J
        But guess what : this page is soon turning from the teen to adult. Didn’t get it,eh?
        Lemme help you here. Your blogger is turning into an adult soon sooner.
        So all I need today is bit “listening ears”. And and and before we get started, here’s wishing all of you a very very happy children’s day and a peaceful Guru Nanak Jayanti.
        
        
        Moving on, this is my officially last children’s day as a child because next year all that would be left for me is random forwards based on how the child in you never dies and the most important thing which people do  #takemebakck #missthosedays ###  *with some random cute childhood photo*
        But do we never kill the child in us? Think. Think. THINK.
        Yes, when I was this teeny tiny bit all I wanted was to do grow up, become independent, get settled and just work my head off. All I want to do was get 18 and do all the exciting things which adults do (PS adults are boring).
        Now as I’m on the threshold of becoming one myself, I don’t really feel like going beyond. Yes, I am freaking out. But why shouldn’t i? Because the thing which will happen in some months would be irreversible. I’m never going be a child legally on the next 14th. None of my mistakes would be ignored with the ”chhoti bachi hai “ clause. All my greedy needs would be cut off saying “You are an adult. Behave like one.”I’m never goint to get to spend all my afternoon wandering as a homeless kid because I’ll be sleep deprived and I can’t afford missing an afternoon nap. I’m never going to be allowed being irresponsible or careless for that matter. Though I am a bit mature but now I have to behave, act, decide as an adult.  Nevertheless, I’m never going to have time to play with my friends those silly games which we used to fight upon. I’ll be glancing upon my childhood favourite toys and cartoon sighing” kitne jaldi bade hogaye hum?” There are literally so many things which I’m never gonna get back to do!! So many privileges taken away in a whiff L
        Thank you mumma for consoling in the cutest way “you are always gonna be my giggly,looking-at-the-fan-and-talking-to-the-calendar girl <3”
        Yes, I know. This cant be stopped. Somethings get better with age. But memories accumulate each day.
        The above things already started happening, LIFE ALREADY STARTED HAPPENING but I really wish I could say “zindagi tham jaa zara”.
        If you still have the child in you alive, take a moment each day to talk to it, to make it feel special, to make it realize that you still love,miss and adore it. J
        Hoping I would already be doing enough justice to the full-of-dreams baby-me.
         To the 10 year old me,” Life’s good! Enjoy your days. You are going to miss them 8 years later.”
        Comment down below your advice to your 10 year old you.
        Thank you for lending your time to this venting out post and being an ardent reader.
        You readers are an asset :*
        ",
        "type" => "13",
        "published_on" => "2018-01-15",
        "is_published" => "1",
        "is_deleted" => "0"
    ],
    [
        "title" => "Fall Out?",
        "blogger_id" => "6",
        "image" => "27.jpg",
        "content" => "With the trending times and “duniya mere smartphone mai” period, the gen-y has this so weird habit of crushing up on someone, texting them 25*8, get habituated to their company and ending up heart broken. The question today lies that when you fall in love its your heart and hormones which send you various signal. But how on earth are you supposed to know when to fall out of love?
        Like is there any kind of symbol or indication to that? I guess 90% of you would agree that there is no such indication to falling out of love.
       How can you fall out of love whereas falling in love was the toughest thing which you ever had to do. Finding that one perfect person and doing all that you could to keep that one person in your life forever.
        So when exactly do you fall out of love?
        I’m afraid but the answer is NEVER. Yes, exactly you never ever fall out of love once you fell in. You may stop liking the person you were dating with but you never fall out of love for them. There is always this teeny, tiny concern which you would hold up for them. it might just be checking up on them daily without they noticing it. Pinging their friends in order to know how they are doing with life and do they still miss you?
       
       BASICALLY YOU NEVER FALL OUT OF LOVE FOR SOMEONE ONCE YOU FELL IN LOVE WITH THEM ☺",
        "type" => "1",
        "published_on" => "2018-09-19",
        "is_published" => "1",
        "is_deleted" => "0"
    ],
    [
        "title" => "How mad is this gen?",
        "blogger_id" => "7",
        "image" => "28.jpg",
        "content" => "hello guys and I'm so sorry but actually I'm running out of time right now. So this is going to be a short, simple post worth a big fat message.
        let's get started..
        
        So this tech gen or better known as the gen Y who came up with the selfie thing is completely addicted to meeting someone socially, talking, liking and then dating by ending heartbroken. But there are still some 0.5% true lovers but they are 99.9% heartbroken.
        So here's a post for all of you.
        
        As I small,little girl I always loved birds to a great, great extent and my dad saw this craze that I had for birds. He ended up buying me a cage on my birthday. This began the hunt for the best bird for the cage. I found this simply melodious,adorable nightingale on my balcony the next day and I laid a trap to catch him up. Lo and behold, he was there in my cage in the next 10 seconds.
        I used to love listening to him everyday when he was free but then something happened to him while he was in my cage; he simply stopped singing. He was no more melodious or adorable but just a simply sulking nightingale who was always sad.
        Seeing him sad ,disappointed me to a great extent and I ended up sharing this with my mommy dearest.
        That's when she came up with an idea that sent a shiver down my spine.....
        She advised me to free him up,IF HE TRULY LOVED SINGING IN FRONT OF YOU, HELL BE BACK.
        I heard to mommy dearest and let him free.
        but I desperately wanted him to be back the other day.
        And he did show up with a new melody !
        Thats when this struck me like thunder....,",
        "type" => "2",
        "published_on" => "2018-11-05",
        "is_published" => "1",
        "is_deleted" => "0"
    ],
    [
        "title" => "Sea-saw",
        "blogger_id" => "8",
        "image" => "29.jpg",
        "content" => "Hellloooooo.....and welcome back!! Hope you all are having a great, lazy summer vacayyy and are constantly thinking about how to make it more productive and fruitful :p
        Worry not, that's never going to happen :D
        So the only thing you can do is either stay in your pjs and laze around everywhere or just roam to all the places of tourist interest to while away your time!
        And one of the most important tourist attractions of Mumbai is the MARINE DRIVE!!
        
        
        
        
        Marine Drive is a 3.5-kilometre-long boulevard in South Mumbai in the city of Mumbai. It is a 'C'-shaped six-lane concrete road along the coast, which is a natural bay.
        Now if you are a mumbaikar you ought to know that there is lot more to this place rather than it being just a bay!
        It is a place of creating memories for some whereas it acts like a solace for the rest.
        Most of the Indian fiction authors depicts this place as an ideal proposal location and well Mumbaikars do consider it as an escape to spend some lone time with their better half. On the other hand, the bay is so peaceful and quiet that it serves like a hideout for the heart broken, dejected people. You could just empty your heart out here and go back with a new you who has this big smile and the courage to face all the upcoming adversities.
        Well I write so much about the Marine Drive how can I forget the sea it is surrounded by?
        The Arabian Sea!! The sea which would actually depict your life.
        
        
        The water in the sea which constantly keeps on moving reminding you that life too never stays still.
        
        
        
        The high and low tides which say that yes you are also going to have your highs and lows.
        
        
        
        The sea is same at bandstand,carters,marine drive and shivaji park indicating to the fact that the life is same for everyone only the foreground changes!
        
        
        The Arabian has seen relations build and break which means even you will build and drift apart from some relations but thats not the end of your life.
        
        
        
        You may drown if you dont know how to keep moving with the flow of the waves. Similarly you may fail miserably if you do not know how to move ahead with time and get past things.
        
        
        It might have faced the scorching heat and the withering clouds but it does stay the same after all of it. So is life with all its steamy and eye watery circumstances but in the end 
        you are a human being passing through it all.
        
        
        
        The nights are always peaceful here. Likewise the nights are the best part of a human creature as it puts its mind to rest and subtly prepares for a new battle the next day brings.
        
        
        
        And the last and the most important thing!!
        It provides us for all our needs but when the needs start turning into greeds and we start exploiting it; it does slap us by storms, tsunamis and various natural calamities occurring in the sea.
        
        
        
        
        In the same manner we should be there to help the people around us and fulfil their needs but we should also stay alert and know when they turn into greeds and pay them for their greeds!!
        it is good to be for THE NEEDY but not for THE GREEDY!!!!
        
        ironically, the thought of this blog post also struck me when i was just relaxing and enjoying every bit of the sunset at marine drive :)
        P.S. THE NATURE TEACHES US ALOT OF THINGS. ITS TIME WE DISCONNECT OURSELVES FROM THE CONNECTING DEVICES AND CONNECT OURSELVES TO NATURE",
        "type" => "3",
        "published_on" => "2018-02-10",
        "is_published" => "1",
        "is_deleted" => "0"
    ],
    [
        "title" => "H.A.P.P.I.N.E.S.S.",
        "blogger_id" => "9",
        "image" => "30.jpg",
        "content" => "A big 9-letter long word right? But why is it put up there? Obviously because its the topic for the blog post today but there is one more reason to it.
        With snapchat giving you a typical International Happiness Day filter to add to all your photos and snap stories its quite obvious that you all might have been aware that its Happiness Day today. Though I don’t believe in being happy just on this day but yes you can at least make it a point to be all smiles today.
        WHAT DOES BEING HAPPY MEAN?
        We all have people and things and places in our life that make us happy.
        We get happy just by texting somebody, talking to someone, spending some quality time with your family or playing your favourite game, visiting your friends, visiting nature or going for a movie or a date and what not. Just like blogging makes me happy but thinking about what to post makes shivers run down my spine.
        So you found and probably know the way that makes you happy but does this world run on selfish mottos or selfless services?
        Yes, the latter one.
        While you have decided on how to make yourself happy there are people around you who are always gloomy and actually have nobody to make them happy. Lucky you are if you are bound by your friends and family for whom your happiness is one of the most important primary concern.
        So when there are people taking care of your happiness, you should also be equally responsible for making somebody else happy!
        Make someone happy who has not smiled for years or who doesn’t know what exactly happiness is.
        There are tonnes of people who work daily on the roads to earn like bare minimum wages which don’t even satisfy their necessities leave alone their wants!
        Make them happy! Your grandparents have nobody to talk to and stay bottled up with emotions for hours. Go talk to them and cherish their memories. They’ll surely smile while thinking about their gold old days.
        Talk nicely to everyone you meet because you never know what they are going through. If you can’t make them smile then just don’t intensify their struggle and pain by being arrogant.
        D Imperfectionist is a blogger but with that she is a proud youtuber too and then this video is perfect for sharing on International Happiness Day!
        
        
        Sahil Khattar goes on hugging everybody he meets and the reactions are amazing.
         Had the world been a better place people would have readily hugged him instead of hesitating up!
        But its never too late to mend your shoes and change.
        Don’t change because you’ll fall if you don’t.
        Change because the society needs one desperately.
        *sending virtual hugs* readers stay blessed, keep smiling and you all are life! <3
        You are happiness for D Imperfectionist and she loves you and tries to keep this love forever.
        
        
         Signing off,
        HAPPY INTERNATIONAL HAPPINESS DAY :)",
        "type" => "4",
        "published_on" => "2018-07-14",
        "is_published" => "1",
        "is_deleted" => "0"
    ],
    [
        "title" => "Perks Of Having A Crush",
        "blogger_id" => "11",
        "image" => "31.jpg",
        "content" => "Hello, Namaste,salaam and iloveyou readers... like i love the fact how you stay tuned to this page irrespective of me being the laziest admin alive and the worst blogger ever :P
        But these silent phases come in your life when you have some adversities as well as when you have engineering as your profession of choice.
        I guess all of you would be wondering what does todays blog indicate to.
        Well we all have had a picture of a person in front of us when we read the word “CRUSH”.
        So know coming to the foremost part of the topic “PERKS” of having a crush.
        But what is a crush? I’m certainly not talking about the mapro made strawberry crush so lamies please stay shut.
        CRUSH – a person who crushes your heart in to pieces.
        Dictionary meanings but
        I feel crush is someone who unknowingly puts a smile on your face whenever you think about him.
        
        
        So what are the perks of having a crush??
        Are they simply there to crush your heart?
        Naah.. so here we begin with a small activity. Now that you have already  imagined your crush infront of your eyes think about him and imagine....
        How lucky you are to share your school life with him..
        Though he is not in your class but just  a glimpse of him daily makes your cheeks all red...
        He gives you butterflies in your mind whenever he passes from your class or whenever you see him walking past you or maybe talking to your friends...
        You danced your heart out the day you actually talk to him in person and find him the cutest person on this earth and think you are the luckiest girl alive to have a crush on somebody so classy and handsome as him.
        And then there was this special day when all of the school and its people were decked up as hell and you got this golden chance to get snapped with him!!! Goosebumps.. goosebumps everywhere haan ^_^
        The first time you texted him and the million times you thought before as to what shall be the first text to send and then after all the phone a friend and expert advice lifelines used you managed to send him a good, sober and not-so-seemingly-desperate  text.
        That first, short but cute chat between you both. Doesn’t that make you all smiles?
        Those days when you wish to let your heart out in front of him but you can’t because that runs with a huge risk of losing him forever which you would die but never take.
        But then at the back of your mind you always want him to be yours and you imagine all the cute things and scenarios that would have happened had you both been together and you still hope one day your dreams might might just come true. :P",
        "type" => "5",
        "published_on" => "2018-10-15",
        "is_published" => "1",
        "is_deleted" => "0"
    ],
];


// $str = rand(1546322043,1577858043);
// date('Y-m-d',rand(1546322043,1577858043)) = date('Y-m-d',rand(1546322043,1577858043))
//dd(date('Y-m-d',rand(1546322043,1577858043)));

// $orders = [
//     [
//         "product_id" => rand(1,10),
//         "customer_id" => rand(1,10),
//         "quantity" => rand(1,50),
//         "date" => date('Y-m-d',rand(1546322043,1577858043))
//     ],
//     [
//         "product_id" => rand(1,10),
//         "customer_id" => rand(1,10),
//         "quantity" => rand(1,50),
//         "date" => date('Y-m-d',rand(1546322043,1577858043))
//     ],
//     [
//         "product_id" => rand(1,10),
//         "customer_id" => rand(1,10),
//         "quantity" => rand(1,50),
//         "date" => date('Y-m-d',rand(1546322043,1577858043))
//     ],
//     [
//         "product_id" => rand(1,10),
//         "customer_id" => rand(1,10),
//         "quantity" => rand(1,50),
//         "date" => date('Y-m-d',rand(1546322043,1577858043))
//     ],
//     [
//         "product_id" => rand(1,10),
//         "customer_id" => rand(1,10),
//         "quantity" => rand(1,50),
//         "date" => date('Y-m-d',rand(1546322043,1577858043))
//     ],
//     [
//         "product_id" => rand(1,10),
//         "customer_id" => rand(1,10),
//         "quantity" => rand(1,50),
//         "date" => date('Y-m-d',rand(1546322043,1577858043))
//     ],
//     [
//         "product_id" => rand(1,10),
//         "customer_id" => rand(1,10),
//         "quantity" => rand(1,50),
//         "date" => date('Y-m-d',rand(1546322043,1577858043))
//     ],
//     [
//         "product_id" => rand(1,10),
//         "customer_id" => rand(1,10),
//         "quantity" => rand(1,50),
//         "date" => date('Y-m-d',rand(1546322043,1577858043))
//     ],
//     [
//         "product_id" => rand(1,10),
//         "customer_id" => rand(1,10),
//         "quantity" => rand(1,50),
//         "date" => date('Y-m-d',rand(1546322043,1577858043))
//     ],
//     [
//         "product_id" => rand(1,10),
//         "customer_id" => rand(1,10),
//         "quantity" => rand(1,50),
//         "date" => date('Y-m-d',rand(1546322043,1577858043))
//     ],
//     [
//         "product_id" => rand(1,10),
//         "customer_id" => rand(1,10),
//         "quantity" => rand(1,50),
//         "date" => date('Y-m-d',rand(1546322043,1577858043))
//     ],
//     [
//         "product_id" => rand(1,10),
//         "customer_id" => rand(1,10),
//         "quantity" => rand(1,50),
//         "date" => date('Y-m-d',rand(1546322043,1577858043))
//     ],
//     [
//         "product_id" => rand(1,10),
//         "customer_id" => rand(1,10),
//         "quantity" => rand(1,50),
//         "date" => date('Y-m-d',rand(1546322043,1577858043))
//     ],
//     [
//         "product_id" => rand(1,10),
//         "customer_id" => rand(1,10),
//         "quantity" => rand(1,50),
//         "date" => date('Y-m-d',rand(1546322043,1577858043))
//     ],
//     [
//         "product_id" => rand(1,10),
//         "customer_id" => rand(1,10),
//         "quantity" => rand(1,50),
//         "date" => date('Y-m-d',rand(1546322043,1577858043))
//     ],
//     [
//         "product_id" => rand(1,10),
//         "customer_id" => rand(1,10),
//         "quantity" => rand(1,50),
//         "date" => date('Y-m-d',rand(1546322043,1577858043))
//     ],
//     [
//         "product_id" => rand(1,10),
//         "customer_id" => rand(1,10),
//         "quantity" => rand(1,50),
//         "date" => date('Y-m-d',rand(1546322043,1577858043))
//     ],
//     [
//         "product_id" => rand(1,10),
//         "customer_id" => rand(1,10),
//         "quantity" => rand(1,50),
//         "date" => date('Y-m-d',rand(1546322043,1577858043))
//     ],
//     [
//         "product_id" => rand(1,10),
//         "customer_id" => rand(1,10),
//         "quantity" => rand(1,50),
//         "date" => date('Y-m-d',rand(1546322043,1577858043))
//     ],
//     [
//         "product_id" => rand(1,10),
//         "customer_id" => rand(1,10),
//         "quantity" => rand(1,50),
//         "date" => date('Y-m-d',rand(1546322043,1577858043))
//     ],
//     [
//         "product_id" => rand(1,10),
//         "customer_id" => rand(1,10),
//         "quantity" => rand(1,50),
//         "date" => date('Y-m-d',rand(1546322043,1577858043))
//     ]

// ];

// for($i=0;$i<sizeof($orders);$i++):
//     $database->table("orders")->insert($orders[$i]);
// endfor;

// $blog_types = [
//     [
//         "name" => "Fashion",
//         "color" => "#FF0000"
//     ],
//     [
//         "name" => "Food",
//         "color" => "#0000FF"
//     ],
//     [
//         "name" => "Travel",
//         "color" => "#008000"
//     ],
//     [
//         "name" => "Music",
//         "color" => "#FFFF00"
//     ],
//     [
//         "name" => "Lifestyle",
//         "color" => "#FFC0CB"
//     ],
//     [
//         "name" => "Fitness",
//         "color" => "#FFA500"
//     ],
//     [
//         "name" => "DIY",
//         "color" => "#800080"
//     ],
//     [
//         "name" => "Sports",
//         "color" => "#000000"
//     ],
//     [
//         "name" => "Finance",
//         "color" => "#A52A2A"
//     ],
//     [
//         "name" => "Political",
//         "color" => "#808080"
//     ],
//     [
//         "name" => "Personal",
//         "color" => "#E6E6FA"
//     ],
//     [
//         "name" => "News",
//         "color" => "#00FFFF"
//     ],
//     [
//         "name" => "Gaming",
//         "color" => "#AAAAAA"
//     ]
    
// ];

for($i=0;$i<sizeof($moreData);$i++):
    $database->table("blogs")->insert($moreData[$i]);
endfor;


?>
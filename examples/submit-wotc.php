<?php

require_once __DIR__ . '/config.php';

$api = get_api();
$faker = Faker\Factory::create();

$now = new DateTime('now');

$form = [];

$form['first_name'] = $faker->firstName;
$form['middle_name'] = "";
$form['last_name'] = $faker->lastName;
$form['other_last_names'] = "";
$fmt = 'Y-m-d';
$form['dob'] = $faker->dateTimeBetween('-60 years', '-18 years')->format($fmt);
$form['address_street'] = $faker->streetAddress;
$form['address_street2'] = "";
$form['address_city'] = $faker->city;
$form['address_state'] = 'CA';
$form['contact_method'] = 'phone';
$form['address_county'] = "";
$form['address_zipcode'] = $faker->postcode;
$form['phone'] = "760-" . $faker->numberBetween(100, 999) . "-" . $faker->numberBetween(1000, 9999);
$form['email'] = $faker->email;
$form['ssn'] =
    $faker->numberBetween(100, 999) . "-"
    . $faker->numberBetween(10, 99) . "-"
    . $faker->numberBetween(1000, 9999);
$form['starting_wage'] = 11.10;
$form['position'] = "Shift Manager";
$form['applied_on'] = $now->format($fmt);
$form['has_startdate'] = false;
$form['rehire'] = false;

$form['signature_date'] = $now->format($fmt);
$form['signature_data'] = "[[{\"x\":192.5,\"y\":45,\"time\":1556503473847,\"color\":\"black\"},{\"x\":191.5," .
    "\"y\":45,\"time\":1556503473849,\"color\":\"black\"},{\"x\":191.5,\"y\":45,\"time\":1556503473866," .
    "\"color\":\"black\"},{\"x\":190.5,\"y\":48,\"time\":1556503473894,\"color\":\"black\"},{\"x\":189.5," .
    "\"y\":52,\"time\":1556503473910,\"color\":\"black\"},{\"x\":188.5,\"y\":56,\"time\":1556503473927," .
    "\"color\":\"black\"},{\"x\":191.5,\"y\":67,\"time\":1556503473943,\"color\":\"black\"},{\"x\":197.5," .
    "\"y\":76,\"time\":1556503473959,\"color\":\"black\"},{\"x\":209.5,\"y\":90,\"time\":1556503473975," .
    "\"color\":\"black\"},{\"x\":227.5,\"y\":102,\"time\":1556503473991,\"color\":\"black\"},{\"x\":247" .
    ".5,\"y\":108,\"time\":1556503474007,\"color\":\"black\"},{\"x\":268.5,\"y\":111," .
    "\"time\":1556503474023,\"color\":\"black\"},{\"x\":289.5,\"y\":109,\"time\":1556503474039," .
    "\"color\":\"black\"},{\"x\":312.5,\"y\":102,\"time\":1556503474055,\"color\":\"black\"},{\"x\":325" .
    ".5,\"y\":95,\"time\":1556503474071,\"color\":\"black\"},{\"x\":334.5,\"y\":84," .
    "\"time\":1556503474087,\"color\":\"black\"},{\"x\":334.5,\"y\":75,\"time\":1556503474103," .
    "\"color\":\"black\"},{\"x\":330.5,\"y\":69,\"time\":1556503474121,\"color\":\"black\"},{\"x\":322.5," .
    "\"y\":63,\"time\":1556503474138,\"color\":\"black\"},{\"x\":312.5,\"y\":62,\"time\":1556503474154," .
    "\"color\":\"black\"},{\"x\":304.5,\"y\":65,\"time\":1556503474170,\"color\":\"black\"},{\"x\":298.5," .
    "\"y\":71,\"time\":1556503474187,\"color\":\"black\"},{\"x\":293.5,\"y\":79,\"time\":1556503474202," .
    "\"color\":\"black\"},{\"x\":292.5,\"y\":91,\"time\":1556503474219,\"color\":\"black\"},{\"x\":295.5," .
    "\"y\":100,\"time\":1556503474236,\"color\":\"black\"},{\"x\":303.5,\"y\":109,\"time\":1556503474251," .
    "\"color\":\"black\"},{\"x\":315.5,\"y\":119,\"time\":1556503474267,\"color\":\"black\"},{\"x\":327" .
    ".5,\"y\":127,\"time\":1556503474283,\"color\":\"black\"},{\"x\":335.5,\"y\":130," .
    "\"time\":1556503474299,\"color\":\"black\"},{\"x\":340.5,\"y\":131,\"time\":1556503474315," .
    "\"color\":\"black\"},{\"x\":343.5,\"y\":131,\"time\":1556503474331,\"color\":\"black\"},{\"x\":345" .
    ".5,\"y\":130,\"time\":1556503474347,\"color\":\"black\"},{\"x\":345.5,\"y\":129," .
    "\"time\":1556503474363,\"color\":\"black\"},{\"x\":345.5,\"y\":128,\"time\":1556503474379," .
    "\"color\":\"black\"},{\"x\":346.5,\"y\":127,\"time\":1556503474396,\"color\":\"black\"},{\"x\":345" .
    ".5,\"y\":129,\"time\":1556503474363,\"color\":\"black\"},{\"x\":346.5,\"y\":127," .
    "\"time\":1556503474442,\"color\":\"black\"}]]";
$form['signature_image'] = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAArgAAADICAYAAAADfZLHAAAX" .
    "+UlEQVR4Xu3dCaxtV10H4B8QEUQRsMzIKIPMsRDGMAkqRJRCQMIg1AEZtAICAom2oGCZRGigjLFQoqQQBWksAoYhzEMElEGCgliZEQ" .
    "MYCYM1f9g3bE/v653OOmufvb+V3KS9d581fGu" .
    "/935vv7XXulAUAgQIECBAgAABAjMSuNCMxmIoBAgQIECAAAECBCLgugkIECBAgAA" .
    "BAgRmJSDgzmo6DYYAAQIECBAgQEDAdQ8QIECAAAECBAjMSkDAndV0GgwBAgQIECBAgICA6x4gQIAAAQIECBCYlYCAO6vpNBgCBAgQI" .
    "ECAAAEB1z1AgAABAgQIECAwKwEBd1bTaTAECBAgQIAAAQICrnuAAAECBAgQIEBgVgIC7qym02AIECBAgAABAgQEXPcAAQIECBAgQI" .
    "DArAQE3FlNp8EQIECAAAECBAgIuO4BAgQIECBAgACBWQkIuLOaToMhQIAAAQIECBAQcN0DBAgQIECAAAECsxIQcGc1nQZDgAABAgQ" .
    "IECAg4LoHCBAgQIAAAQIEZiUg4M5qOg2GAAECBAgQIEBAwHUPECBAgAABAgQIzEpAwJ3VdBoMAQIECBAgQICAgOseIECAAAECBAgQ" .
    "mJWAgDur6TQYAgQIECBAgAABAdc9QIAAAQIECBAgMCsBAXdW02kwBAgQIECAAAECAq57gAABAgQIECBAYFYCAu6sptNgCBAgQIAAA" .
    "QIEBFz3AAECBAgQIECAwKwEBNxZTafBECBAgAABAgQICLjuAQIECBAgQIAAgVkJCLizmk6DIUCAAAECBAgQEHDdAwQIECBAgAABAr" .
    "MSEHBnNZ0GQ4AAAQIECBAgIOC6BwgQIECAAAECBGYlIODOajoNhgABAgQIECBAQMB1DxAgQIAAAQIECMxKQMCd1XQaDAECBAgQIECA" .
    "gIDrHiBAgAABAgQIEJiVgIA7q" .
    "+k0GAIECBAgQIAAAQHXPUCAAAECBAgQIDArAQF3VtNpMAQIECBAgAABAgKue2DJAndI8pYlAxg7AQ" .
    "IECBCYo4CAO8dZNab9CPxzkusk+UqS4/bzAdcQIECAAAEC2yEg4G7HPOnlegVOSvKcUZX" .
    "/muRa621CbQQIECBAgEAvAQG3l7x2ewqc" .
    "t9L4F5JcoWeHtE2AAAECBAisT0DAXZ+lmrZD4N5Jzlrp6p2T/P12dF8vCRAgQIAAgb0EBNy9hPx8bgKvTnKv0aA+n+SKcxuk8RA" .
    "gQIAAgSULCLhLnv1ljv1jSa43GvqbktxlmRRGTYAAAQIE5ikg4M5zXo1qd4HaLeFLKz96RJLnAyNAgAABAgTmIyDgzmcujWRvgUc" .
    "mefbKZZfbJfTuXZMrCBAgQIAAgckKCLiTnRodayDwwCQvH9X73iS3aNCOKgkQIECAAIGOAgJuR3xNb1ygdk+oXRR2" .
    "yt2TnL3xXmiQAAECBAgQaCog4DblVfmEBK6e5KNJLj7q09WSfGZCfdQVAgQIECBAYA0CAu4aEFWxFQKPSfKMUU9fluTBW9FznSRAgA" .
    "ABAgQOJCDgHojLxVss8IQkTx31" .
    "/+QkT97i8eg6AQIECBAgcAwBAdetsRSBk5I8ZzTYE5K8ZimDN04CBAgQILAkAQF3SbO97LHeIcmb" .
    "RwRvSXLHZZMYPQECBAgQmKeAgDvPeTWq8wsIuO4KAgQIECCwEAEBdyETbZjfEzhvxcH978YgQIAAAQIzFPAH" .
    "/Awn1ZCOKVBLFOpJ7" .
    "k6pJQq1VEGZl8Blh3n+apLbJrl+kvrv2wyn1tWWcZ8e" .
    "/vtVSepLIUCAAIEZCQi4M5pMQ9lT4KVJfm101X2Emz3NtumCU5LcPslNkl" .
    "z6AB3/SJJXJ/likucf4HMuJUCAAIGJCgi4E50Y3WoiUE/w3j6q+UlJKhQp2y1Qc1jHMF9zDcN4X5K/dV" .
    "+sQVIVBAgQ6Cgg4HbE13QX" .
    "gfcmufnQcv2z9WW69EKj6xC4R5JTk1x3pbKPJzk3yTuG79dyhC+PjmWuJQr1VctVaj" .
    "/k3UotXXmWo5zXMU3qIECAwOYFBNzNm2uxr8" .
    "Ajkzx71IW7Jnl93y5p/RACD0nyx0lqve24nJjkjAPW90tJ/jDJ8bt87jD1HbB5lxMgQIDAugUE3HWLqm8bBN4" .
    "/CjPvSnLrbei0Pn5P" .
    "YOep6/hlwW8keWKS045odK1hqcPqU11rtY8I6+MECBDYtICAu2lx7U1BoJ7" .
    "+vXDoyBeSXGEKndKHfQmcleTeoytflORNa35ZsOqvdsb" .
    "Fjhv7mh4XESBAYBoCAu405kEvNitQ624/nOTKQ7P3T/IXm+2C1g4h8IokNVc7pfVLgqv7JluucIhJ8xECBAj0EBBwe6hrcwoCte7" .
    "ytUNH3pPkllPolD4cU2D1qeomlg3U7gwPH63z/W6S+w5bipkqAgQIEJiwgIA74cnRtaYCl0zyqdEuCq2fBjYdzMwrrxfAan52yul" .
    "D8NzEsB+c5M9HDX0iyf2SfGATjWuDAAECBA4nIOAezs2n5iFQT+jGLxTdLck58xjarEbx70muMoyotv6qgPmZDY7wAUnOHLX3yS" .
    "T1vXryrxAgQIDABAUE3AlOii5tTOCKw8EPOwcE1N6n9TKRMg2B2qv27CQ3GLrz9SQ3S1JPUTdd6rjfOvFsp9SJZ4/YdCe0R4AA" .
    "AQL7ExBw9+fkqvkK3CrJOwWXyU1whdunr+yY0HsZyS8med1IqraXq23mFAIECBCYmICAO7EJ0Z0uAqtLFTbxAlOXgW5Ro3UYRx3" .
    "KsVOmMifjLebqCW49yVUIECBAYGICAu7EJkR3ughcKslTRi8u1T+F16b/X+rSG43utmNCnTZX89K71MlpXxw6UUsWbti7Q9onQIA" .
    "AgfMLCLjuCgI/EBgfIvDtJBeF00WgdreoJQpVei9L2A2gXnD7yeEHfg/tcotolAABAhcs4DdndwiB/y/wtSQ/NnzrVUnqn8aVzQ" .
    "mM9yeuVusFs49urvl9tVR74z5vuNIJZ/sicxEBAgQ2KyDgbtZba9MX+Nnh6NednnpbfrNzVsGxAmSVeqGrAu/UyvFJ3j90aopPm" .
    "KfmpT8ECBDYuICAu3FyDW6BwBuS3GXUzzslefMW9HsOXTx3dITylZJ8bqKD2llGUS/DPXqifdQtAgQILFZAwF3s1Bv4BQhcJMl3" .
    "Vn7+E0n+k1pTgVp3W8GxytT3JP6bJHdPUgdP3LapisoJECBA4MACAu6ByXxgIQI3SvLhlbH69dJ28sdbcJ2R5MS2zR2p9jq+t47" .
    "xFXCPxOjDBAgQaCPgD+w2rmqdh8DvJHnuaCgvSPKweQxtkqOoZSB3GHo29WOTd5YoPDPJYyepqVMECBBYsICAu+DJN/R9CfxPko" .
    "uNrqwXoE7f1ydddFCB84YPfD5JPUH/8kEr2ND149Pv7pHktRtqVzMECBAgsE8BAXefUC5brMCPJ/mvldFP+eWnbZ2oenK78yJfH" .
    "bBxuQkPpP6C89Chf1dO8tkJ91XXCBAgsEgBAXeR027QBxS4fJJ6qjguxyX5ygHrcfmxBcanl0156616Ee4DSS4zHNNbx" .
    "/UqBAgQIDAxAQF3YhOiO5MVuGWSd630zq+f9U3X+AWzqe5/W6M9JcnJw7BvNoTd9SmoiQABAgTWIuAP6LUwqmQhArXe8q9HY" .
    "/1qkisk+dZCxt9ymOPgONUtwq6T5O+GY4SnvstDy7lSNwECBCYvIOBOfop0cGICqzsr1FPd2+2yb+7Euj357ozX4E414I5D" .
    "+DWSfHryqjpIgACBhQoIuAudeMM+ksDPDU/ydip5eZLf9CT3SKZTD7i3SPLuYYROLzvSVPswAQIE2gsIuO2NtTBPgRsn" .
    "+dBoaO9Jcsckta2YcnCB6yf5yPCx2pWgdieYUvmnJDcY+njDKXVMXwgQIEDg/AICrruCwOEFLp7kzCT3GlVxk11OQDt8C8v65M4" .
    "+uLUt26UnNPSzktQuD1W8WDahidEVAgQIHEtAwHVvEDiawEWTvDLJCaNqfjrJx49W7SI//cYkd57QU9IKtY9KUgc7VKkn9LU" .
    "+WCFAgACBiQsIuBOfIN3bCoGLJHlKkt8f9fbJo+2ktmIQE+jk+Kje3mGywu3Thx0TiuY+SV41ASNdIECAAIF9CAi4" .
    "+0ByCYF9CvxWkheMrj0tyUn7/KzLvn+SWb1sVqVnwK2dMmrHhDrMoULt8z25dXsSIEBguwQE3O2aL72dvsBNk" .
    "/zDSjcrKNWeucoFC4y34epxmtklkzxx9CT+RUnOSfIaE0eAAAEC2yUg4G7XfOntdgjUW/b/uNLVGyWpN/GVYwuM" .
    "/3Kw6b1w6y8hL01Sh3lUqeUJz03yHyaMAAECBLZPQMDdvjnT4+0QuNIu4egrSa6S5JvbMYSN9/JSw9Pvqw8tb+r3p1pvu" .
    "/NVW5W9PsljNj56DRIgQIDA2gQ29QfI2jqsIgJbJHDhJG8a1pOOu33PlSN" .
    "/t2hIzbv6vCQPH1qp5QF3a9jiFZPcP8kzhjZqve3OV8NmVU2AAAECrQUE3NbC6ieQ3CbJ23eBqPBWIU75gcD4wIf67rWTfLIBUAX" .
    "bXx7tb3tGkpd5mayBtCoJECDQQUDA7YCuyUUK1FZiJyf5g5XRf2x4wvuFRarsPujxy2YfGA5XWAfPLwz77NZODccPFdZa33qZ7C" .
    "/X" .
    "0YA6CBAgQGAaAgLuNOZBL5YlUOs7d/5ZfGfk9ab+iUnqFC8l+Zck1xwgHp3k2UdAeXCShySpJQk763sr2P6uU+eOoOqjBAgQmLC" .
    "AgDvhydG12QvUE8XTR6HrG0k+lOTxx1jSMHuQ0QBvneQdo/8/6EELt0jysCQPGtVRL5C9NckjlgRprAQIEFiigIC7xFk35qkJX" .
    "G04EraeKI5LPXV8SZLzptbhDfXnhcOT12qunrjeL8nnLqDtW" .
    "r9bf2l41so19dLal51EtqFZ0wwBAgQmICDgTmASdIHAIPCjSV6c5L4rIvWUt44CXuKerONwXzsc1JPccant2OrksXrqPS5fSvK4" .
    "JPXymEKAAAECCxMQcBc24Ya7FQKXHU7UeuQuvX3/8LR3t10ZtmJwB+xkvRBWR/julHcludfw4tlzklxjpb76eQXeejlNIUCAAI" .
    "GFCgi4C514w94Kgdp5oQ4guKA3/N+Q5LQk5w7rd+e4nGE15O42eb+XpJY0/PdWzKxOEiBAgEBTAQG3Ka/KCaxN4LpJHpvk1/dR4" .
    "5lJzk5y1j6uneIlFezraOOrDjsd3OkYnXx3kpOSvG+Kg9AnAgQIEOgnIOD2s9cygaMI3H7YIaC2Ftut1JPcrye5WJI3Dl9vG47CP" .
    "Uq7rT5bL9r9SpKn7dHAd5NUAK5S62wv16pD6iVAg" .
    "ACB7RUQcLd37vScwFigQl9tjXXz4TCDH0lyrCef9blXDksfak3vZzdMeeMkt0vy80kusctRxuPu/NVwEMMHk9RhGLU37qmjE8hqd" .
    "4U7brj/miNAgACBiQsIuBOfIN0jcESBWr960+HFtPon/71KPeWto3Ffl+QzSf532KasvneQ9a03SXLcELpr54P6/91KP" .
    "Wn+WpIfSlLriSuw1teH99ge7VMrhzY8yTG7e02tnxMgQGA5AgLucubaSAmUwE8lqX1hH3UIjnrSe6kk9XT4qOWjw9ZndZjDvx2ystp" .
    "doQJ8lXUe6XvI7vgYAQIECExFQMCdykzoB4E+AnV87Q2S/GqS6w1LHI7Vkzpk4ZLDsoKD9PY7w04PdRxxbeP17YN8eI9rxyG3Ti" .
    "q74RrrVhUBAgQIbKmAgLulE6fbBDoL1O8dl09y4VE/6nu15GDTa3rHIbe6U8sVTunso3kCBAgQ6Cgg4HbE1zQBAmsTqEB78qg" .
    "2IXdttCoiQIDA9gkIuNs3Z3pMgMDuAq9Icv/Rj3Y72pcdAQIECCxAQMBdwCQbIoEFCaw+ya2Q+8RhZ4gFMRgqAQIEli0g4C57" .
    "/o2ewBwFameFWq6ws8NCvdj2R0nOmeNgjYkAAQIEzi8g4LorCBCYq8CfrmyHdnqSxyX5xlwHbFwECBAg8H0BAdedQIDAnAU" .
    "emuS3h63Qapy1VdkJcx6wsREgQICAgOseIEBg/gK11+/ZSX5mGGqdlPb4JO+Z/9CNkAABAssU8AR3mfNu1ASWJnDZYU3uWaOBn5H" .
    "kxKVBGC8BAgSWICDgLmGWjZEAgR2B6yepJ7gVeKvUC2i3xkOAAAEC8xIQcOc1n0ZDgMDeArW7wjOTHD9cem6SRyepLcUUAgQI" .
    "EJiBgIA7g0k0BAIEDiWwustCvYB2qrW5h7L0IQIECExKQMCd1HToDAECGxaop7lPTXKrUbv38TR3w7OgOQIECKxZQMBdM6jqCB" .
    "DYOoGrJPmN4XCInc5/KsmLk5x2xH1zLzqs8X1nkm9tnYwOEyBAYEsFBNwtnTjdJkBg7QJXT/KEJA8Z1fyRJC9J8meHaK1C82OT" .
    "XCfJJ5I8Y6jrEFX5CAECBAgcREDAPYiWawkQWILAPYege7PRYGvnhbcmeWWSTyf55j4gzkzygNF1r0jywH18ziUECBAgcE" .
    "QBAfeIgD5OgMAsBY4bTj97eZKrrozwg0nq6xJJar3usUoF4tuNfvi2JLefpZZBESBAYGICAu7EJkR3CBCYnMDDktw9yV0vo" .
    "GfnJKlQ/MPDmt1rj/ba3fnYx5LUPrwKAQIECDQWEHAbA6ueAIHZCNS+uRV0a03tCUkudsCRPSvJYw74GZcTIECAwCEEBNx" .
    "DoPkIAQIEkpyS5EFJ6uW0vYqnt3sJ+TkBAgTWKCDgrhFTVQQILFag9tM9MUktTRjvqfui4aW0P1msjIETIEC" .
    "gg4CA2wFdkwQIECBAgAABAu0EBNx2tmomQIAAAQIECBDoICDgdkDXJAECBAgQIECAQDsBAbedrZoJECBAgAABAgQ6CAi4HdA1S" .
    "YAAAQIECBAg0E5AwG1nq2YCBAgQIECAAIEOAgJuB3RNEiBAgAABAgQItBMQcNvZqpkAAQIECBAgQKCDgIDbAV2TBAgQIECAAAEC" .
    "7QQE3Ha2aiZAgAABAgQIEOggIOB2QNckAQIECBAgQIBAOwEBt52tmgkQIECAAAECBDoICLgd0DVJgAABAgQIECDQTkDAbWerZgIE" .
    "CBAgQIAAgQ4CAm4HdE0SIECAAAECBAi0ExBw29mqmQABAgQIECBAoIOAgNsBXZMECBAgQIAAAQLtBATcdrZqJkCAAAECBAgQ6CAg" .
    "4HZA1yQBAgQIECBAgEA7AQG3na2aCRAgQIAAAQIEOggIuB3QNUmAAAECBAgQINBOQMBtZ6tmAgQIECBAgACBDgICbgd0TRIgQIA" .
    "AAQIECLQTEHDb2aqZAAECBAgQIECgg4CA2wFdkwQIECBAgAABAu0EBNx2tmomQIAAAQIECBDoICDgdkDXJAECBAgQIECAQDsBAb" .
    "edrZoJECBAgAABAgQ6CAi4HdA1SYAAAQIECBAg0E5AwG1nq2YCBAgQIECAAIEOAgJuB3RNEiBAgAABAgQItBMQcNvZqpkAAQIE" .
    "CBAgQKCDgIDbAV2TBAgQIECAAAEC7QQE3Ha2aiZAgAABAgQIEOggIOB2QNckAQIECBAgQIBAOwEBt52tmgkQIECAAAECBDo" .
    "ICLgd0DVJgAABAgQIECDQTkDAbWerZgIECBAgQIAAgQ4CAm4HdE0SIECAAAECBAi0ExBw29mqmQABAgQIECBAoIOAgNsBXZME" .
    "CBAgQIAAAQLtBATcdrZqJkCAAAECBAgQ6CAg4HZA1yQBAgQIECBAgEA7AQG3na2aCRAgQIAAAQIEOggIuB3QNUmAAAECBAgQI" .
    "NBOQMBtZ6tmAgQIECBAgACBDgICbgd0TRIgQIAAAQIECLQTEHDb2aqZAAECBAgQIECgg4CA2wFdkwQIECBAgAABAu0EBNx2tm" .
    "omQIAAAQIECBDoICDgdkDXJAECBAgQIECAQDsBAbedrZoJECBAgAABAgQ6CAi4HdA1SYAAAQIECBAg0E5AwG1nq2YCBAgQIECA" .
    "AIEOAgJuB3RNEiBAgAABAgQItBMQcNvZqpkAAQIECBAgQKCDgIDbAV2TBAgQIECAAAEC7QQE3Ha2aiZAgAABAgQIEOggIOB2QN" .
    "ckAQIECBAgQIBAOwEBt52tmgkQIECAAAECBDoICLgd0DVJgAABAgQIECDQTkDAbWerZgIECBAgQIAAgQ4CAm4HdE0SIECAAAE" .
    "CBAi0ExBw29mqmQABAgQIECBAoIOAgNsBXZMECBAgQIAAAQLtBATcdrZqJkCAAAECBAgQ6CAg4HZA1yQBAgQIECBAgEA7gf8D0" .
    "R7d2AQDnp0AAAAASUVORK5CYII=";
$form['rehire'] = $faker->boolean;

if ($form['rehire']) {
    $form['rehire_last_employment'] = $faker->dateTimeBetween('-10 years', '-256 days')->format($fmt);
}

$form['has_startdate'] = $faker->boolean;
if ($form['has_startdate']) {
    $form['started_on'] = $faker->dateTimeBetween('-10 years', '-256 days')->format($fmt);
}


$result = $api->post(
    'wotc',
    [
        'form'   => $form,
    ]
);

echo '<pre>', var_dump($result), '</pre>'; exit;

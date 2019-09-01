# Client for *iSystems* REST API

Installation:
1. Clone repository

Usage:
1. Change `app.php`
2. Run `app.php`
3. Repeat


#Review from iSystems:
Danylo,

poniżej recenzja Twojego kodu:

@\App\Models\Model

1. Ta abstrakcja jest bardzo uboga, w kwestii logiki, którą współdzieli, natomiast w znacznym stopniu determinuje, jak powinien zachować się obiekt, który ja rozszerza. W związku z tym prawdopodobnie byłoby lepiej, gdyby zamiast abstrakcji utworzyć interface.

@\App\Models\Producer

1. Tutaj trudno się do czegoś na poważnie przyczepić. Być może nazwa klasy mogłaby być nieco lepsza, ponieważ prawie w ogóle nie jest związana z producentem i przy małym nakładzie pracy można by z niej zrobić klasę uniwersalna.

@\App\Service\Client

1. Obsługa błędu w konstruktorze - to powinien być throw wyjątku, a nie die

2. Dynamiczne property $request;

3. Gdybym chciał wprowadzić obsługę nowego modelu klasę muszę zmienić lub rozszerzyć.

4. użyłeś OR w konstruktorze, zamiast ||. Wynik takiej operacji może być zaskakujący, zwłaszcza dla and.  Być może jest to zamierzone, ale z mojego doświadczenia wynika, że zawsze oczekiwany wynik to ten, który zwraca operacja zdefiniowana przez zapis || lub &&. Przykład:

$a = true and false;
$b = true && false;

@\App\Service\Parameter

1. metoda validate generuje zmienną $exception, której później nie używa

2. zamiast metody __toJson warto zastosować interface \JsonSerializable

@\App\Service\Request

1. dynamiczne properties w konstruktorze

2. Scope metody \App\Service\Request::request powoduje, że bardzo ciężko będzie rozszerzyć tę klasę.

@Ogólne

1. Spore braki w definiowaniu zwracanych typów przez metody

2. W composer.json zdefiniowałeś namespace Models oraz Service zdaje się niepotrzebnie (namespace App już je zawiera)


Danylo, niestety na ten moment nie jesteśmy zainteresowani rozpoczęciem z Tobą współpracy. Błędy, które pojawiały się w Twoim rozwiązaniu sugerują, że jeszcze nie do końca biegle posługujesz się php, ale widać spory potencjał. Proponujemy, żebyśmy wrócili do kwestii Twojej aplikacji na przykład za 6 miesięcy, jeśli nadal będziesz zainteresowany.


pozdrawiam, KK



<?php

declare(strict_types=1);

namespace mirzaev\site\account\models\generators;

// Файлы проекта
use mirzaev\site\account\models\core;

// Генератор по модели цепи Маркова
use Scriptura\Markov\Chain as chain,
  Scriptura\Markov\Generator as generator,
  Scriptura\Markov\RNG\RandomIntRNG as rng;

// Встроенные библиотеки
use exception;

/**
 * Модель генератора паролей
 *
 * @package mirzaev\site\account\models
 * @author Arsen Mirzaev Tatyano-Muradovich <arsen@mirzaev.sexy>
 */
final class password extends core
{
  /**
   * Сгенерировать мнемонический пароль
   *
   * @param int $length Длина (количество слов)
   * @param array &$errors Реестр ошибок
   *
   * @return ?string Пароль
   */
  public static function mnemonic(int $length = 4, array &$errors = []): ?string
  {
    try {
      preg_match_all(
        '/\w+/um',
        mb_convert_encoding(
          <<<TEXT
            Коридор был пуст. Мгновение я постоял перед закрытой дверью, прислушиваясь. Стены, наверно, были тонкими, снаружи сквозь них проникал плач ветра. На двери, немного наискось, висел небрежно прикрепленный прямоугольный кусок пластыря с карандашной надписью «Человек». Неразборчиво нацарапанное слово вызвало у меня желание вернуться к Снауту, но я понял, что это невозможно.

            Нелепое предостережение все еще звучало в ушах. Тихо, как будто бессознательно скрываясь от невидимого наблюдателя, я вернулся в круглую камеру с пятью дверьми. На трех из них висели таблички: «Д-р Гибарян», «Д-р Снаут», «Д-р Сарториус». На четвертой таблички не было. Поколебавшись, я нажал ручку. Пока дверь медленно открывалась, у меня появилось граничащее с уверенностью ощущение, что в комнате кто-то есть. Я вошел внутрь.

            В комнате никого не было. Выпуклое окно глядело на океан, который жирно блестел под солнцем, как будто с волн стекало красное масло. Пурпурный отблеск заливал комнату, похожую на корабельную каюту. С одной стороны ее находились полки с книгами и прикрепленная вертикально к стене кровать в карданной подвеске. С другой было очень много шкафчиков. Между ними в никелированных рамках висели фотоснимки планеты. В металлических захватах торчали колбы и пробирки, заткнутые ватой. Под окном в два ряда громоздились белые эмалированные ящики с инструментами. В углах комнаты – краны, вытяжной шкаф, холодильные установки, на полу стоял микроскоп, для него уже не было места на большом столе у окна.

            Я обернулся и около входной двери увидел шкаф с открытыми дверцами до самого потолка. В нем висели комбинезоны, рабочие и защитные халаты, на полках – белье, между голенищами противорадиационных сапог поблескивали алюминиевые баллоны для переносных кислородных аппаратов. Два аппарата с масками болтались на поручне поднятой кровати. Везде был тот же кое-как упорядоченный хаос.

            Я втянул воздух и почувствовал слабый запах химических реактивов. Машинально поискал глазами вентиляционные решетки. Прикрепленные к ним полоски бумаги легонько колебались, показывая, что компрессоры работают, поддерживая нормальный обмен воздуха. Я перенес книги, аппараты и инструменты с двух кресел в углы, распихал все это как попало, и вокруг постели, между шкафом и полками, образовалось относительно пустое пространство. Потом подтянул вешалку, чтобы повесить на нее скафандр, и уже взялся за замки-молнии, но тут же их отпустил. Я никак не мог решиться снять скафандр, как будто от этого стал бы беззащитным. Еще раз я окинул взглядом комнату. Дверь была плотно закрыта, но замка в ней не было, и после недолгого колебания я припер ее двумя самыми тяжелыми ящиками.

            Забаррикадировавшись так, я освободился от своей скрипящей оболочки. Узкое зеркало на внутренней поверхности шкафа отражало часть комнаты. Углом глаза я заметил какое-то движение, вскочил, но тут же понял, что это мое собственное отражение. Комбинезон под скафандром пропотел. Я сбросил его и толкнул шкаф. Он отъехал в сторону, и в нише за ним заблестели стены миниатюрной ванной комнаты. На полу, под душем, лежал довольно большой плоский ящик, который я с трудом втащил в комнату. Когда я опускал его на пол, крышка отскочила как на пружине, и я увидел отделения, набитые странными предметами. Ящик был полон страшно изуродованных инструментов из темного металла, немного похожих на те, которые лежали в шкафах. Все они никуда не годились, бесформенные, скрученные, оплавленные, словно вынесенные из пожара. Самым удивительным было то, что повреждения такого же характера были даже на керамитовых, то есть практически не плавящихся, рукоятках. Ни в одной лабораторной печи нельзя было получить температуру, при которой они бы плавились, разве что внутри атомного котла. Из кармана моего скафандра я достал портативный дозиметр, но черный цилиндрик молчал, когда я поднес его к обломкам.

            На мне были только трусы и рубашка-сетка. Я скинул их на пол и пошел под душ. Вода принесла облегчение. Я изгибался под потоком твердых горячих струй, массировал тело, фыркал и делал все это как-то преувеличенно, как будто хотел вытравить из себя эту жуткую, внушающую подозрения неуверенность, охватившую станцию.

            В шкафу я нашел легкий тренировочный костюм, который можно было носить под скафандром, переложил в карман все свое скромное имущество. Между листами блокнота я нащупал что-то твердое – это был каким-то чудом попавший сюда ключ от моего земного жилья. Я повертел его в руках, не зная, что с ним делать, потом положил на стол. Мне пришло в голову, что неплохо бы иметь какое-нибудь оружие. Универсальный перочинный нож тут явно не годился, но ничего другого у меня не было, а я еще не дошел до такого состояния, чтобы искать ядерный излучатель или что-нибудь в этом роде. Я уселся на металлический стульчик, который стоял посредине пустого пространства, в отдалении от всех вещей. Мне хотелось побыть одному. С удовольствием я отметил, что у меня есть еще полчаса времени. Стрелки на двадцатичетырехчасовом циферблате показывали семь. Солнце заходило. Семь часов местного времени – значит двадцать часов на борту «Прометея». На экранах Моддарда Солярис, наверно, уже уменьшился до размеров искорки и ничем не отличался от звезд. Но какое я имею отношение к «Прометею»? Я закрыл глаза. Стояла полная тишина, только в ванной капли воды глухо стучали по кафелю.
             

            Гибарян мертв. Если я правильно понял Снаута, с момента его смерти прошло всего несколько часов.

            Что сделали с его телом? Похоронили? Правда, здесь, на Солярисе, этого сделать нельзя. Некоторое время я обдумывал это, будто судьба мертвого была так уж важна. Поняв бессмысленность подобных размышлений, я встал и начал ходить по комнате, поддавая носком беспорядочно разбросанные книги. Потом поднял с пола фляжку из темного стекла, такую легкую, будто она была сделана из бумаги. Посмотрел сквозь нее в окно, в мрачно пламенеющие, затянутые грозным туманом последние лучи заката. Что со мной? Почему я занимаюсь какими-то глупостями, какой-то ненужной ерундой?

            Я вздрогнул – зажегся свет. Очевидно, фотоэлементы среагировали на наступающие сумерки. Я был полон ожидания, напряжение нарастало до такой степени, что мне уже действовало на нервы пустое пространство за спиной. С этим пора было кончать.

            Я придвинул кресло к полкам, взял хорошо известный мне второй том старой монографии Хьюджеса и Эгла «История Соляриса» и начал его перелистывать, подперев толстый жесткий переплет коленом.

            Солярис был открыт почти за сто лет до того, как я родился. Планета обращается вокруг двух солнц – красного и голубого. В течение сорока с лишним лет к ней не приближался ни один космический корабль. В то время теория Гамова – Шепли о невозможности зарождения жизни на планетах двойных звезд не вызывала сомнений. Орбиты таких планет непрерывно изменяются из-за непостоянства сил притяжения, вызванного взаимным обращением двух солнц.

            Возникающие изменения гравитационного поля сокращают или растягивают орбиту планеты, и зародыши жизни, если они возникнут, будут уничтожены испепеляющим жаром или космическим холодом. Эти изменения происходят регулярно через каждые несколько миллионов лет, то есть в астрономическом или биологическом масштабе за очень короткий промежуток времени, так как эволюция требует сотен миллионов, если не миллиардов лет.

            Солярис, по предварительным подсчетам, должен был за пятьсот тысяч лет приблизиться на расстояние половины астрономической единицы к своему красному солнцу,[1] а еще через миллион лет упасть в его раскаленную бездну. Но уже через несколько лет выяснилось, что орбита планеты не подвергается ожидаемым изменениям, вроде бы она постоянная, такая же постоянная, как орбиты планет нашей Солнечной системы.

            Повторенные – на этот раз с максимальной точностью – наблюдения и вычисления лишь подтвердили то, что уже было известно: орбита Соляриса нестабильна. И если до этого Солярис был всего-навсего одной из нескольких сотен ежегодно открываемых планет, которым в статистических сборниках уделяют десяток строчек, где описываются элементы их движения, то теперь он немедленно перешел в ранг небесного тела, достойного самого пристального внимания.

            Через четыре года после этого открытия планету облетела экспедиция Оттеншельда, который изучал Солярис с «Лаокоона» и двух вспомогательных космолетов.[2] Эта экспедиция носила характер предварительной разведки, тем более что высадиться на планету она не могла. Ученые запустили на экваториальные и полярные орбиты большое количество автоматических спутников-наблюдателей. Спутники должны были главным образом измерять гравитационные потенциалы. Кроме того, изучался океан, почти целиком покрывающий планету, и немногочисленные возвышающиеся над его поверхностью плоскогорья. Их общая площадь оказалась меньше, чем территория Европы, хотя Солярис имел диаметр на двадцать процентов больше земного. Эти лоскутки скалистой пустынной суши, разбросанные как попало, скопились главным образом в Южном полушарии. Был также определен состав атмосферы, лишенной кислорода, и произведены чрезвычайно точные измерения плотности планеты, альбедо и других астрономических показателей.[3] Как и ожидалось, ни на жалких клочках суши, ни в океане не удалось обнаружить никаких следов жизни.

            В течение дальнейших десяти лет Солярис, теперь уже находящийся в центре внимания всех наблюдателей этого района, демонстрировал поразительную тенденцию к сохранению своей, вне всякого сомнения, гравитационно-нестабильной орбиты. Запахло было скандалом, так как вину за такие результаты наблюдений пытались возложить (заботясь о благе науки) то на определенных людей, то на вычислительные машины, которыми они пользовались.

            Отсутствие средств задержало отправку специальной соляристической экспедиции еще на три года, вплоть до того момента, когда Шеннон, укомплектовавший команду, получил от института три космических корабля тоннажа «С» космодромного класса. За полтора года до прибытия экспедиции, которая вылетела с альфы Водолея, другая исследовательская группа по поручению института вывела на околосоляристическую орбиту автоматический сателлоид – Луну-247. Этот сателлоид после трех последовательных реконструкций, отделенных друг от друга десятками лет, работает до сегодняшнего дня. Данные, которые он собрал, окончательно подтвердили выводы экспедиции Оттеншельда об активном характере движения океана.

            Один корабль Шеннона остался на дальней орбите, два других после предварительных приготовлений сели у Южного полюса планеты на скалистом клочке суши, который занимает около тысячи квадратных километров. Работа экспедиции закончилась через восемнадцать месяцев и прошла очень успешно, за исключением одного несчастного случая, вызванного неисправностью аппаратуры. Однако ученые экспедиции раскололись на два враждующих лагеря. Предметом спора стал океан. На основании анализов он был признан органическим образованием (назвать его живым никто еще не решался). Но если биологи видели в нем организм весьма примитивный, что-то вроде одной чудовищно разросшейся жидкой клетки (они называли ее «добиологическая формация»), которая окружила всю планету студенистой оболочкой, местами глубиной в несколько километров, то астрономы и физики утверждали, что это должна быть чрезвычайно высокоорганизованная структура, сложностью своего строения превосходящая земные организмы, коль скоро она в состоянии активно влиять на форму планетной орбиты. Никакой иной причины, объясняющей стабилизацию Соляриса, открыто не было. Кроме того, планетофизики установили связь между определенными процессами, происходящими в плазменном океане, и локальными колебаниями гравитационного потенциала, которые зависели от океанического «обмена веществ».

            Таким образом, физики, а не биологи выдвинули парадоксальную формулировку «плазматическая машина», имея в виду образование, в нашем понимании, возможно, и неодушевленное, но способное к целенаправленным действиям в астрономическом масштабе.

            В этом споре, который за несколько недель втянул в свою орбиту все выдающиеся авторитеты, доктрина Гамова – Шепли пошатнулась впервые за восемьдесят лет.

            Некоторое время ее еще пытались защищать, утверждая, что океан ничего общего с жизнью не имеет, что он является даже не образованием пара – или добиологическим, а всего лишь геологической формацией, по всей вероятности необычной, но способной лишь к стабилизации орбиты Соляриса посредством изменения силы тяжести; при этом ссылались на закон Ле Шателье.
          TEXT,
          'UTF-8'
        ),
        $matches
      );

      // Инициализация цепочки
      $chain = new chain(1);

      // Обучение
      $chain->learn($matches[0]);

      // Инициализация генератора
      $generator = new generator(new rng(222, 666), $chain);

      // Генерация
      $result = $generator->generate();

      // Обрезка результата
      for ($password = [], $choose = rand(0, count($result) - 20); isset($result[$choose]) && count($password) < $length; $choose++) $password[] = $result[$choose];

      return implode(' ', $password);
    } catch (exception $e) {
      // Запись в реестр ошибок
      $errors[] = [
        'text' => $e->getMessage(),
        'file' => $e->getFile(),
        'line' => $e->getLine(),
        'stack' => $e->getTrace()
      ];
    }

    return null;
  }

  /**
   * Сгенерировать классический пароль
   *
   * @param int $length Длина (количество символов)
   * @param array &$errors Реестр ошибок
   *
   * @return ?string Пароль
   */
  public static function classic(int $length = 12, array &$errors = []): ?string
  {
    try {
      // Инициализация реестра символов
      $symbols = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

      // Инициализация буфера пароля
      $password = '';

      // Определение максимальной длины 
      $max = mb_strlen($symbols, '8bit') - 1;
      if ($max < 1) throw new Exception('Длина пароля должна быть не менее двух символов');

      // Генерация пароля
      for ($i = 0; $i < $length; ++$i) $password .= $symbols[random_int(0, $max)];

      return $password;
    } catch (exception $e) {
      // Запись в реестр ошибок
      $errors[] = [
        'text' => $e->getMessage(),
        'file' => $e->getFile(),
        'line' => $e->getLine(),
        'stack' => $e->getTrace()
      ];
    }

    return null;
  }
}

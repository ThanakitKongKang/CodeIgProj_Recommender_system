<?php

/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2019, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2019, British Columbia Institute of Technology (https://bcit.ca/)
 * @license	https://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') or exit('No direct script access allowed');
require_once './vendor/autoload.php';

use Phpml\FeatureExtraction\TfIdfTransformer;

/**
 * Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/general/controllers.html
 */
class CI_Controller
{
	public static $stopWords = [
		'a', 'about', 'above', 'after', 'again', 'against', 'all', 'am', 'an', 'and', 'any', 'are', 'aren\'t', 'as', 'at', 'be', 'because',
		'been', 'before', 'being', 'below', 'between', 'both', 'but', 'by', 'can\'t', 'cannot', 'could', 'couldn\'t', 'did', 'didn\'t',
		'do', 'does', 'doesn\'t', 'doing', 'don\'t', 'down', 'during', 'each', 'few', 'for', 'from', 'further', 'had', 'hadn\'t', 'has',
		'hasn\'t', 'have', 'haven\'t', 'having', 'he', 'he\'d', 'he\'ll', 'he\'s', 'her', 'here', 'here\'s', 'hers', 'herself', 'him',
		'himself', 'his', 'how', 'how\'s', 'i', 'i\'d', 'i\'ll', 'i\'m', 'i\'ve', 'if', 'in', 'into', 'is', 'isn\'t', 'it', 'it\'s', 'its',
		'itself', 'let\'s', 'me', 'more', 'most', 'mustn\'t', 'my', 'myself', 'no', 'nor', 'not', 'of', 'off', 'on', 'once', 'only', 'or',
		'other', 'ought', 'our', 'oursourselves', 'out', 'over', 'own', 'same', 'shan\'t', 'she', 'she\'d', 'she\'ll', 'she\'s', 'should',
		'shouldn\'t', 'so', 'some', 'such', 'than', 'that', 'that\'s', 'the', 'their', 'theirs', 'them', 'themselves', 'then', 'there',
		'there\'s', 'these', 'they', 'they\'d', 'they\'ll', 'they\'re', 'they\'ve', 'this', 'those', 'through', 'to', 'too', 'under',
		'until', 'up', 'very', 'was', 'wasn\'t', 'we', 'we\'d', 'we\'ll', 'we\'re', 'we\'ve', 'were', 'weren\'t', 'what', 'what\'s',
		'when', 'when\'s', 'where', 'where\'s', 'which', 'while', 'who', 'who\'s', 'whom', 'why', 'why\'s', 'with', 'won\'t', 'would',
		'wouldn\'t', 'you', 'you\'d', 'you\'ll', 'you\'re', 'you\'ve', 'your', 'yours', 'yourself', 'yourselves', '-', 'I', 'II', 'III',
		'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'The', 'A', '_', 'st', 'nd', 'th', 'edition', 'Volume', '\'s',
	];

	/**
	 * Reference to the CI singleton
	 *
	 * @var	object
	 */
	private static $instance;

	/**
	 * Class constructor
	 *
	 * @return	void
	 */
	public function __construct()
	{
		self::$instance = &$this;

		// Assign all the class objects that were instantiated by the
		// bootstrap file (CodeIgniter.php) to local class variables
		// so that CI can run as one big super object.
		foreach (is_loaded() as $var => $class) {
			$this->$var = &load_class($class);
		}

		$this->load = &load_class('Loader', 'core');
		$this->load->initialize();
		log_message('info', 'Controller Class Initialized');
		$this->load->library('session');
	}



	// --------------------------------------------------------------------

	/**
	 * Get the CI singleton
	 *
	 * @static
	 * @return	object
	 */
	public static function &get_instance()
	{
		return self::$instance;
	}



	public function check_auth($page)
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}
	}

	public function check_auth_admin($page)
	{
		if ($this->session->userdata('user')['username'] != "admin") {
			redirect(base_url());
		}
	}

	public function similarityDistance($preferences, $person1, $person2)
	{
		$similar = array();
		$sum = 0;

		foreach ($preferences[$person1] as $key => $value) {
			if (array_key_exists($key, $preferences[$person2]))
				$similar[$key] = 1;
		}

		if (count($similar) == 0)
			return 0;

		foreach ($preferences[$person1] as $key => $value) {
			if (array_key_exists($key, $preferences[$person2])) {
				$sum = $sum + pow($value - $preferences[$person2][$key], 2);
			}
		}

		return  1 / (1 + sqrt($sum));
	}


	public function matchItems($preferences, $person)
	{
		$score = array();

		foreach ($preferences as $otherPerson => $values) {

			if ($otherPerson !== $person) {

				$sim = $this->similarityDistance($preferences, $person, $otherPerson);

				if ($sim > 0) {
					$score[$otherPerson] = $sim;
				}
			}
		}

		array_multisort($score, SORT_DESC);
		return $score;
	}


	public function transformPreferences($preferences)
	{
		$result = array();

		foreach ($preferences as $otherPerson => $values) {
			foreach ($values as $key => $value) {
				$result[$key][$otherPerson] = $value;
			}
		}

		return $result;
	}

	public function flip_array($data)
	{
		$arr = array();
		$keys = array_keys($data);
		$book_name = "";
		$username = "";
		for ($i = 0; $i < count($data); $i++) {

			foreach ($data[$keys[$i]] as $key => $value) {
				if ($key == "book_name") {
					$book_name = $value;
				} else if ($key == "username") {
					$username = $value;
				} else if ($key == "rate") {
					$arr[$username][$book_name] = $value;
				}
			}
		}
		return $arr;
	}

	public function array_average($input)
	{
		$sum = array();
		$repeat = array();
		$result = array();
		foreach ($input as $array) {
			foreach ($array as $key => $value) {
				if (array_key_exists($key, $sum)) {
					$repeat[$key] = $repeat[$key] + 1;
					$sum[$key] = $sum[$key] + $value;
				} else {
					$repeat[$key] = 1;
					$sum[$key] = $value;
				}
			}
		}
		foreach ($sum as $key => $value) {
			$result[][$key] = $value / $repeat[$key];
		}
		return $result;
	}

	public function array_flatten($array)
	{
		if (!is_array($array)) {
			return FALSE;
		}
		$result = array();
		foreach ($array as $key => $value) {
			if (is_array($value)) {
				$result = array_merge($result, $this->array_flatten($value));
			} else {
				$result[$key] = $value;
			}
		}
		return $result;
	}
	public function dot_product($a, $b)
	{
		$dot_product = 0;

		foreach ($a as $key_a => $value_a) {
			if (array_key_exists($key_a, $b)) {
				$dot_product += $a[$key_a] * $b[$key_a];
				// echo "<br>true " . $key_a;
			} else {
				// echo "<br>false " . $key_a;
			}
		}
		// echo "<br>dot_product : ".$dot_product;
		return $dot_product;

		// $products = array_map(function ($a, $b) {
		//     // echo "<br>array_map : " . $a * $b;
		//     return $a * $b;
		// }, $a, $b);
		// return array_reduce($products, function ($a, $b) {
		//     return $a + $b;
		// });

	}
	public function magnitude($point)
	{
		$squares = array_map(function ($x) {
			return pow($x, 2);
		}, $point);
		return sqrt(array_reduce($squares, function ($a, $b) {
			return $a + $b;
		}));
	}

	public function cosine($a, $b)
	{
		// echo "<div class='container'><h4>watcher</h4>";
		// echo "<br><br>";
		// echo "<br>magnitude a : " . self::magnitude($a);
		// echo "<br>magnitude b : " . self::magnitude($b);
		// echo "<br>magnitude a*b : " . self::magnitude($a) * self::magnitude($b);
		// echo "<br>dotproduct ab : " . self::dot_product($a, $b);
		// echo "</div>";

		return self::dot_product($a, $b) / (self::magnitude($a) * self::magnitude($b));
	}

	public function getCourseRecommend()
	{
		$username = $this->session->userdata('user')['username'];
		// rec course
		// start recommend by registered course
		$data['course_registered'] = $this->course_model->get_course_registered($username);
		if (!empty($data['course_registered'])) {
			$data['books_name'] = $this->books_model->get_name_all();
			// TF
			$data['words_segment'] = array();
			foreach ($data['books_name'] as $book_name) {
				array_push($data['words_segment'], array_count_values(str_word_count($book_name['book_name'], 1)));
			}

			// Stop words removal
			$stopWords = array_flip(self::$stopWords);
			$data['tf_no_stopwords'] = array();
			foreach ($data['words_segment'] as $word_segment) {
				array_push($data['tf_no_stopwords'], array_diff_key($word_segment, $stopWords));
				// print("<pre> " . print_r(array_diff_key($word_segment, $stopWords), true) . "</pre>");
			}

			// change key to lowercase
			foreach ($data['tf_no_stopwords'] as $tf_no_stopwords) {
				$data['tf_no_stopwords2'][] = array_change_key_case($tf_no_stopwords, CASE_LOWER);
			}

			// IDF
			$transformer = new TfIdfTransformer($data['tf_no_stopwords2']);
			$transformer->transform($data['tf_no_stopwords2']);

			$file = base_url() . "assets/_etc/course_registered_keyword.json";
			$data['course_registered_keyword'] = json_decode(file_get_contents($file), true);

			// get course keywords by user's registered courses's id
			$data['item'] = array();
			$i = 0;
			foreach ($data['course_registered'] as $id_registered => $result_registered) {
				foreach ($data['course_registered_keyword'] as $id_courses => $result_courses) {
					if ($result_registered['course_id'] == $id_courses) {
						foreach ($result_courses as $id => $result) {
							$data['item'][$id_courses][$id] = 1;
						}
						$i++;
					}
				}
			}
			$data['course_count'] = $i;

			// cosine similarity 
			$data['cosineSim_course'] = array();
			$k = 0;
			foreach ($data['item'] as $item_key => $item) {
				foreach ($data['books_name'] as $book_name) {
					$data['cosineSim_course'][$item_key][$k + 1] =  $this->cosine($data['item'][$item_key], $data['tf_no_stopwords2'][$k]);
					$k++;
				}
				$k = 0;
			}

			// remove 0 similarity from array 
			// and
			// get content based books detail
			// get course detail
			foreach ($data['cosineSim_course'] as $key => $cosineSim) {
				$course_detail = $this->course_model->get_course_by_id($key);
				$data['recommend_list_detail_course'][$key] = array("detail" => array(
					'course_id' => $course_detail[0]->course_id,
					'course_name_th' => $course_detail[0]->course_name_th,
					'course_name_en' => $course_detail[0]->course_name_en,
				));
				foreach ($cosineSim as $subCosine_key => $subCosine) {
					if ($subCosine == 0 || is_nan($subCosine)) {
						unset($data['cosineSim_course'][$key][$subCosine_key]);
					} else {
						$data['recommend_list_detail_course'][$key][$subCosine_key] = $this->books_model->get_by_id($subCosine_key);
						$data['recommend_list_detail_course'][$key][$subCosine_key]['match'] = $subCosine;
					}
				}
			}

			// sort by similarity score
			// unset course that has no recommended book
			foreach ($data['recommend_list_detail_course'] as $key => $value) {
				$match = array_column($data['recommend_list_detail_course'][$key], 'match');
				array_multisort($match, SORT_DESC, $data['recommend_list_detail_course'][$key]);

				if (count($data['recommend_list_detail_course'][$key])  == 1) {
					unset($data['recommend_list_detail_course'][$key]);
				}
			}
		} else {
			$data['recommend_list_detail_course'] = false;
		}

		return  $data['recommend_list_detail_course'];
	}

	public function activity_search($search_keyword)
	{
		$this->load->model('activity_model');

		$username = $this->session->userdata('user')['username'];
		if ($username != 'admin') {
			date_default_timezone_set('Asia/Bangkok');
			$date = date('Y/m/d H:i:s', time());
			$data = array(
				'search_keyword' => $search_keyword,
				'date' => $date,
				'username' => $username,
			);

			$this->activity_model->insert_search($data);
		}
	}

	public function getActivityRecommend_search()
	{
		$this->load->model('activity_model');

		$username = $this->session->userdata('user')['username'];
		// rec activity
		// start recommend by registered activity
		$data['recently_search'] = $this->activity_model->get_recently_search($username, "rows");
		if (!empty($data['recently_search'])) {
			$data['books_name'] = $this->books_model->get_name_all();
			// TF
			$data['words_segment'] = array();
			foreach ($data['books_name'] as $book_name) {
				array_push($data['words_segment'], array_count_values(str_word_count($book_name['book_name'], 1)));
			}

			// Stop words removal
			$stopWords = array_flip(self::$stopWords);
			$data['tf_no_stopwords'] = array();
			foreach ($data['words_segment'] as $word_segment) {
				array_push($data['tf_no_stopwords'], array_diff_key($word_segment, $stopWords));
				// print("<pre> " . print_r(array_diff_key($word_segment, $stopWords), true) . "</pre>");
			}

			// change key to lowercase
			foreach ($data['tf_no_stopwords'] as $tf_no_stopwords) {
				$data['tf_no_stopwords2'][] = array_change_key_case($tf_no_stopwords, CASE_LOWER);
			}

			// IDF
			$transformer = new TfIdfTransformer($data['tf_no_stopwords2']);
			$transformer->transform($data['tf_no_stopwords2']);


			// TF for search keyword
			$data['words_segment_search'] = array();
			foreach ($data['recently_search'] as $search) {
				array_push($data['words_segment_search'], array_count_values(str_word_count($search['search_keyword'], 1)));
			}

			// change key to lowercase
			$data['wsm_search_lower'] = array();
			$i = 0;
			foreach ($data['words_segment_search'] as $words_segment_search) {
				$data['wsm_search_lower'][$i + 1] = array_change_key_case($words_segment_search, CASE_LOWER);
				$i++;
			}

			// cosine similarity 
			$data['cosineSim_activity'] = array();
			$k = 0;
			foreach ($data['wsm_search_lower'] as $item_key => $item) {
				foreach ($data['books_name'] as $book_name) {
					$data['cosineSim_activity'][$item_key][$k + 1] =  $this->cosine($data['wsm_search_lower'][$item_key], $data['tf_no_stopwords2'][$k]);
					$k++;
				}
				$k = 0;
			}
			$data['recommend_averaged'] = $this->array_average($data['cosineSim_activity']);
			$data['recommend_flattened'] = $this->array_flatten($data['recommend_averaged']);

			// remove 0 similarity from array 
			// and
			// get content based books detail
			// get activity detail
			$data['recommend_list_detail_activity'] = array();
			foreach ($data['recommend_flattened'] as $key => $cosineSim) {
				if ($cosineSim == 0 || is_nan($cosineSim)) {
					unset($data['recommend_flattened'][$key]);
				} else {
					$data['recommend_list_detail_activity'][$key + 1] = $this->books_model->get_by_id($key + 1);
					$data['recommend_list_detail_activity'][$key + 1]['match'] = $cosineSim;
				}
			}

			// sort by similarity score
			// unset activity that has no recommended book
			foreach ($data['recommend_list_detail_activity'] as $key => $value) {
				$match = array_column($data['recommend_list_detail_activity'], 'match');
				array_multisort($match, SORT_DESC, $data['recommend_list_detail_activity']);

				if (count($data['recommend_list_detail_activity'])  == 1) {
					unset($data['recommend_list_detail_activity']);
				}
			}

			shuffle($data['recommend_list_detail_activity']);

			// start at 1
			array_unshift($data['recommend_list_detail_activity'], "");
			unset($data['recommend_list_detail_activity'][0]);
		} else {
			$data['recommend_list_detail_activity'] = false;
		}
		return  $data['recommend_list_detail_activity'];
	}

	public function getActivityRecommend_viewed()
	{
		$this->load->model('activity_model');

		$username = $this->session->userdata('user')['username'];
		// rec activity
		// start recommend by registered activity
		$data['recently_view'] = $this->activity_model->get_recently_view($username, 5, "rows");
		if (!empty($data['recently_view'])) {
			$data['books_name'] = $this->books_model->get_name_all();
			// TF
			$data['words_segment'] = array();
			foreach ($data['books_name'] as $book_name) {
				array_push($data['words_segment'], array_count_values(str_word_count($book_name['book_name'], 1)));
			}

			// Stop words removal
			$stopWords = array_flip(self::$stopWords);
			$data['tf_no_stopwords'] = array();
			foreach ($data['words_segment'] as $word_segment) {
				array_push($data['tf_no_stopwords'], array_diff_key($word_segment, $stopWords));
				// print("<pre> " . print_r(array_diff_key($word_segment, $stopWords), true) . "</pre>");
			}

			// change key to lowercase
			foreach ($data['tf_no_stopwords'] as $tf_no_stopwords) {
				$data['tf_no_stopwords2'][] = array_change_key_case($tf_no_stopwords, CASE_LOWER);
			}

			// IDF
			$transformer = new TfIdfTransformer($data['tf_no_stopwords2']);
			$transformer->transform($data['tf_no_stopwords2']);

			// TF - IDF for recently view items
			// TF
			$data['words_segment_view'] = array();
			foreach ($data['recently_view'] as $book_name) {
				array_push($data['words_segment_view'], array_count_values(str_word_count($book_name['book_name'], 1)));
			}

			// Stop words removal
			$stopWords = array_flip(self::$stopWords);
			$data['tf_no_stopwords_view'] = array();
			foreach ($data['words_segment_view'] as $word_segment) {
				array_push($data['tf_no_stopwords_view'], array_diff_key($word_segment, $stopWords));
				// print("<pre> " . print_r(array_diff_key($word_segment, $stopWords), true) . "</pre>");
			}

			// change key to lowercase
			foreach ($data['tf_no_stopwords_view'] as $tf_no_stopwords_view) {
				$data['tf_no_stopwords2_view'][] = array_change_key_case($tf_no_stopwords_view, CASE_LOWER);
			}

			// IDF
			$transformer = new TfIdfTransformer($data['tf_no_stopwords2_view']);
			$transformer->transform($data['tf_no_stopwords2_view']);


			// cosine similarity 
			$data['cosineSim_activity'] = array();
			$k = 0;
			foreach ($data['tf_no_stopwords2_view'] as $item_key => $item) {
				foreach ($data['books_name'] as $book_name) {
					$data['cosineSim_activity'][$item_key][$k + 1] =  $this->cosine($data['tf_no_stopwords2_view'][$item_key], $data['tf_no_stopwords2'][$k]);
					$k++;
				}
				$k = 0;
			}
			$data['recommend_averaged'] = $this->array_average($data['cosineSim_activity']);
			$data['recommend_flattened'] = $this->array_flatten($data['recommend_averaged']);

			// remove 0 similarity from array 
			// and
			// get content based books detail
			// get activity detail
			foreach ($data['recently_view'] as $key => $book) {
				// unset($data['recommend_list_detail_activity'][$book["book_id"]]);
				$data['recommend_list_detail_activity'][$book["book_id"]]["match"] -= 0.5;
			}

			$data['recommend_list_detail_activity'] = array();
			foreach ($data['recommend_flattened'] as $key => $cosineSim) {
				if ($cosineSim <= 0.1 || is_nan($cosineSim)) {
					unset($data['recommend_flattened'][$key]);
				} else {
					$data['recommend_list_detail_activity'][$key + 1] = $this->books_model->get_by_id($key + 1);
					$data['recommend_list_detail_activity'][$key + 1]['match'] = $cosineSim;
				}
			}

			shuffle($data['recommend_list_detail_activity']);
			// start at 1
			array_unshift($data['recommend_list_detail_activity'], "");
			unset($data['recommend_list_detail_activity'][0]);
		} else {
			$data['recommend_list_detail_activity'] = false;
		}
		return  $data['recommend_list_detail_activity'];
	}

	public function getActivity_viewAgain()
	{
		$this->load->model('activity_model');

		$username = $this->session->userdata('user')['username'];
		// rec activity
		$data['recently_view'] = $this->activity_model->get_recently_view($username, 10, "rows");
		if (!empty($data['recently_view'])) {
			$data['recommend_list_detail_activity'] = $data['recently_view'];
			// start at 1
			array_unshift($data['recommend_list_detail_activity'], "");
			unset($data['recommend_list_detail_activity'][0]);
		} else {
			$data['recommend_list_detail_activity'] = false;
		}
		return  $data['recommend_list_detail_activity'];
	}

	public function getActivity_popular()
	{
		$this->load->model('activity_model');

		// rec activity
		$data['recommend_list_detail_activity'] = $this->activity_model->get_popular_view(7, 10, "rows");
		if (!empty($data['recommend_list_detail_activity'])) {
			// get top 10 popular
			// $data['recommend_list_detail_activity'] = (array_slice($data['popular_view'], 0, 10));

			// start at 1
			array_unshift($data['recommend_list_detail_activity'], "");
			unset($data['recommend_list_detail_activity'][0]);
		} else {
			$data['recommend_list_detail_activity'] = false;
		}
		return  $data['recommend_list_detail_activity'];
	}
}

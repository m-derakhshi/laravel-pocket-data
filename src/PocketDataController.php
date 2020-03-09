<?php


namespace mderakhshi\PocketData;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PocketDataController extends Controller
{
	public function get(Request $request) {
		$response = [];
		foreach ((array)$request->input('routes') as $item => $array) {
			$array['parameters'] = (isset($array['parameters']) and is_array($array['parameters'])) ? $array['parameters'] : [];
			$array['method']     = (isset($array['method']) and in_array(strtolower($array['method']), ['get', 'post', 'delete', 'put', 'patch'])) ? strtolower($array['method']) : 'get';
			
			if (!isset($array['url'])) {
				$response[$item] = null;
				continue;
			}
			$objectFetch     = app()->handle(Request::create($array['url'], $array['method'], ((array)$array['parameters'])));
			$response[$item] = empty($objectFetch->exception) ? $objectFetch->original : null;
		}
		
		return $response;
	}
	
}

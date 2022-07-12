import haxe.Json;
import tink.http.containers.*;
import tink.http.Response;
import tink.web.routing.*;

using Lambda;

class Server {
	static function main() {
		#if js
		var container = new NodeContainer(8080);
		#elseif php
		// use PhpContainer instead of NodeContainer when targeting PHP
		var container = PhpContainer.inst;
		#end
		var router = new Router<Root>(new Root());

		container.run(function(req) {
			return router.route(Context.ofRequest(req)).recover(OutgoingResponse.reportError);
		});

		trace("Server is listening at port 8080");
	}
}

class Root {
	function print(s:String) {
		#if js
		trace(s);
		#end
	}

	public function new() {}

	@:get("/hello")
	public function hello() {
		print("Received /hello");
		return "OK";
	}

	@:post("/calculate/sum")
	public function sum(body:{operands:Array<Int>}) {
		final sum = function(num, total) return total += num;
		final res = body.operands.fold(sum, 0);
		print('Received /calculate/sum with operands ${body.operands} which results in ${res}');
		return {"result": res};
	}

	@:post("/calculate/subtraction")
	public function subtraction(body:{operands:Array<Int>}) {
		final start = body.operands[0];
		body.operands.remove(0);
		final sum = function(num, total) return total -= num;
		final res = body.operands.fold(sum, start);
		print('Received /calculate/subtraction with operands ${body.operands} which results in ${res}');
		return {"result": res};
	}

	@:post("/calculate/multiplication")
	public function multiplication(body:{operands:Array<Int>}) {
		final start = body.operands[0];
		body.operands.remove(0);
		final sum = function(num, total) return total *= num;
		final res = body.operands.fold(sum, start);
		print('Received /calculate/multiplication with operands ${body.operands} which results in ${res}');
		return {"result": res};
	}

	@:post("/calculate/division")
	public function division(body:{operands:Array<Int>}) {
		if (body.operands.length != 2) {
			final error = new OutgoingResponse(StatusCode.BadRequest, Json.stringify({"error": "Invalid number of operands"}));
			return error;
		}
		if (body.operands[1] == 0) {
			final error = new OutgoingResponse(StatusCode.BadRequest, Json.stringify({"error": "Invalid division by zero"}));
			return error;
		}
		final error = new OutgoingResponse(StatusCode.BadRequest, Json.stringify({"error": "Invalid number of operands"}));
		return error;
		final res = body.operands[0] / body.operands[1];
		print('Received /calculate/multiplication with operands ${body.operands} which results in ${res}');
		return new OutgoingResponse(StatusCode.OK, Json.stringify({"result": res}));
	}
}

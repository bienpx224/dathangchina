(function() {
  'use strict';

  var globals = typeof window === 'undefined' ? global : window;
  if (typeof globals.require === 'function') return;

  var modules = {};
  var cache = {};
  var aliases = {};
  var has = ({}).hasOwnProperty;

  var expRe = /^\.\.?(\/|$)/;
  var expand = function(root, name) {
    var results = [], part;
    var parts = (expRe.test(name) ? root + '/' + name : name).split('/');
    for (var i = 0, length = parts.length; i < length; i++) {
      part = parts[i];
      if (part === '..') {
        results.pop();
      } else if (part !== '.' && part !== '') {
        results.push(part);
      }
    }
    return results.join('/');
  };

  var dirname = function(path) {
    return path.split('/').slice(0, -1).join('/');
  };

  var localRequire = function(path) {
    return function expanded(name) {
      var absolute = expand(dirname(path), name);
      return globals.require(absolute, path);
    };
  };

  var initModule = function(name, definition) {
    var hot = null;
    hot = hmr && hmr.createHot(name);
    var module = {id: name, exports: {}, hot: hot};
    cache[name] = module;
    definition(module.exports, localRequire(name), module);
    return module.exports;
  };

  var expandAlias = function(name) {
    return aliases[name] ? expandAlias(aliases[name]) : name;
  };

  var _resolve = function(name, dep) {
    return expandAlias(expand(dirname(name), dep));
  };

  var require = function(name, loaderPath) {
    if (loaderPath == null) loaderPath = '/';
    var path = expandAlias(name);

    if (has.call(cache, path)) return cache[path].exports;
    if (has.call(modules, path)) return initModule(path, modules[path]);

    throw new Error("Cannot find module '" + name + "' from '" + loaderPath + "'");
  };

  require.alias = function(from, to) {
    aliases[to] = from;
  };

  var extRe = /\.[^.\/]+$/;
  var indexRe = /\/index(\.[^\/]+)?$/;
  var addExtensions = function(bundle) {
    if (extRe.test(bundle)) {
      var alias = bundle.replace(extRe, '');
      if (!has.call(aliases, alias) || aliases[alias].replace(extRe, '') === alias + '/index') {
        aliases[alias] = bundle;
      }
    }

    if (indexRe.test(bundle)) {
      var iAlias = bundle.replace(indexRe, '');
      if (!has.call(aliases, iAlias)) {
        aliases[iAlias] = bundle;
      }
    }
  };

  require.register = require.define = function(bundle, fn) {
    if (typeof bundle === 'object') {
      for (var key in bundle) {
        if (has.call(bundle, key)) {
          require.register(key, bundle[key]);
        }
      }
    } else {
      modules[bundle] = fn;
      delete cache[bundle];
      addExtensions(bundle);
    }
  };

  require.list = function() {
    var list = [];
    for (var item in modules) {
      if (has.call(modules, item)) {
        list.push(item);
      }
    }
    return list;
  };

  var hmr = globals._hmr && new globals._hmr(_resolve, require, modules, cache);
  require._cache = cache;
  require.hmr = hmr && hmr.wrap;
  require.brunch = true;
  globals.require = require;
})();

(function() {
var global = window;
var __makeRelativeRequire = function(require, mappings, pref) {
  var none = {};
  var tryReq = function(name, pref) {
    var val;
    try {
      val = require(pref + '/node_modules/' + name);
      return val;
    } catch (e) {
      if (e.toString().indexOf('Cannot find module') === -1) {
        throw e;
      }

      if (pref.indexOf('node_modules') !== -1) {
        var s = pref.split('/');
        var i = s.lastIndexOf('node_modules');
        var newPref = s.slice(0, i).join('/');
        return tryReq(name, newPref);
      }
    }
    return none;
  };
  return function(name) {
    if (name in mappings) name = mappings[name];
    if (!name) return;
    if (name[0] !== '.' && pref) {
      var val = tryReq(name, pref);
      if (val !== none) return val;
    }
    return require(name);
  }
};

require.register("phoenix/priv/static/phoenix.js", function(exports, require, module) {
  require = __makeRelativeRequire(require, {}, "phoenix");
  (function() {
    (function(exports){
"use strict";

var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol ? "symbol" : typeof obj; };

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

Object.defineProperty(exports, "__esModule", {
  value: true
});

function _toConsumableArray(arr) { if (Array.isArray(arr)) { for (var i = 0, arr2 = Array(arr.length); i < arr.length; i++) { arr2[i] = arr[i]; } return arr2; } else { return Array.from(arr); } }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

// Phoenix Channels JavaScript client
//
// ## Socket Connection
//
// A single connection is established to the server and
// channels are multiplexed over the connection.
// Connect to the server using the `Socket` class:
//
//     let socket = new Socket("/ws", {params: {userToken: "123"}})
//     socket.connect()
//
// The `Socket` constructor takes the mount point of the socket,
// the authentication params, as well as options that can be found in
// the Socket docs, such as configuring the `LongPoll` transport, and
// heartbeat.
//
// ## Channels
//
// Channels are isolated, concurrent processes on the server that
// subscribe to topics and broker events between the client and server.
// To join a channel, you must provide the topic, and channel params for
// authorization. Here's an example chat room example where `"new_msg"`
// events are listened for, messages are pushed to the server, and
// the channel is joined with ok/error/timeout matches:
//
//     let channel = socket.channel("room:123", {token: roomToken})
//     channel.on("new_msg", msg => console.log("Got message", msg) )
//     $input.onEnter( e => {
//       channel.push("new_msg", {body: e.target.val}, 10000)
//        .receive("ok", (msg) => console.log("created message", msg) )
//        .receive("error", (reasons) => console.log("create failed", reasons) )
//        .receive("timeout", () => console.log("Networking issue...") )
//     })
//     channel.join()
//       .receive("ok", ({messages}) => console.log("catching up", messages) )
//       .receive("error", ({reason}) => console.log("failed join", reason) )
//       .receive("timeout", () => console.log("Networking issue. Still waiting...") )
//
//
// ## Joining
//
// Creating a channel with `socket.channel(topic, params)`, binds the params to
// `channel.params`, which are sent up on `channel.join()`.
// Subsequent rejoins will send up the modified params for
// updating authorization params, or passing up last_message_id information.
// Successful joins receive an "ok" status, while unsuccessful joins
// receive "error".
//
// ## Duplicate Join Subscriptions
//
// While the client may join any number of topics on any number of channels,
// the client may only hold a single subscription for each unique topic at any
// given time. When attempting to create a duplicate subscription,
// the server will close the existing channel, log a warning, and
// spawn a new channel for the topic. The client will have their
// `channel.onClose` callbacks fired for the existing channel, and the new
// channel join will have its receive hooks processed as normal.
//
// ## Pushing Messages
//
// From the previous example, we can see that pushing messages to the server
// can be done with `channel.push(eventName, payload)` and we can optionally
// receive responses from the push. Additionally, we can use
// `receive("timeout", callback)` to abort waiting for our other `receive` hooks
//  and take action after some period of waiting. The default timeout is 5000ms.
//
//
// ## Socket Hooks
//
// Lifecycle events of the multiplexed connection can be hooked into via
// `socket.onError()` and `socket.onClose()` events, ie:
//
//     socket.onError( () => console.log("there was an error with the connection!") )
//     socket.onClose( () => console.log("the connection dropped") )
//
//
// ## Channel Hooks
//
// For each joined channel, you can bind to `onError` and `onClose` events
// to monitor the channel lifecycle, ie:
//
//     channel.onError( () => console.log("there was an error!") )
//     channel.onClose( () => console.log("the channel has gone away gracefully") )
//
// ### onError hooks
//
// `onError` hooks are invoked if the socket connection drops, or the channel
// crashes on the server. In either case, a channel rejoin is attempted
// automatically in an exponential backoff manner.
//
// ### onClose hooks
//
// `onClose` hooks are invoked only in two cases. 1) the channel explicitly
// closed on the server, or 2). The client explicitly closed, by calling
// `channel.leave()`
//
//
// ## Presence
//
// The `Presence` object provides features for syncing presence information
// from the server with the client and handling presences joining and leaving.
//
// ### Syncing initial state from the server
//
// `Presence.syncState` is used to sync the list of presences on the server
// with the client's state. An optional `onJoin` and `onLeave` callback can
// be provided to react to changes in the client's local presences across
// disconnects and reconnects with the server.
//
// `Presence.syncDiff` is used to sync a diff of presence join and leave
// events from the server, as they happen. Like `syncState`, `syncDiff`
// accepts optional `onJoin` and `onLeave` callbacks to react to a user
// joining or leaving from a device.
//
// ### Listing Presences
//
// `Presence.list` is used to return a list of presence information
// based on the local state of metadata. By default, all presence
// metadata is returned, but a `listBy` function can be supplied to
// allow the client to select which metadata to use for a given presence.
// For example, you may have a user online from different devices with a
// a metadata status of "online", but they have set themselves to "away"
// on another device. In this case, they app may choose to use the "away"
// status for what appears on the UI. The example below defines a `listBy`
// function which prioritizes the first metadata which was registered for
// each user. This could be the first tab they opened, or the first device
// they came online from:
//
//     let state = {}
//     state = Presence.syncState(state, stateFromServer)
//     let listBy = (id, {metas: [first, ...rest]}) => {
//       first.count = rest.length + 1 // count of this user's presences
//       first.id = id
//       return first
//     }
//     let onlineUsers = Presence.list(state, listBy)
//
//
// ### Example Usage
//
//     // detect if user has joined for the 1st time or from another tab/device
//     let onJoin = (id, current, newPres) => {
//       if(!current){
//         console.log("user has entered for the first time", newPres)
//       } else {
//         console.log("user additional presence", newPres)
//       }
//     }
//     // detect if user has left from all tabs/devices, or is still present
//     let onLeave = (id, current, leftPres) => {
//       if(current.metas.length === 0){
//         console.log("user has left from all devices", leftPres)
//       } else {
//         console.log("user left from a device", leftPres)
//       }
//     }
//     let presences = {} // client's initial empty presence state
//     // receive initial presence data from server, sent after join
//     myChannel.on("presences", state => {
//       presences = Presence.syncState(presences, state, onJoin, onLeave)
//       displayUsers(Presence.list(presences))
//     })
//     // receive "presence_diff" from server, containing join/leave events
//     myChannel.on("presence_diff", diff => {
//       presences = Presence.syncDiff(presences, diff, onJoin, onLeave)
//       this.setState({users: Presence.list(room.presences, listBy)})
//     })
//
var VSN = "1.0.0";
var SOCKET_STATES = { connecting: 0, open: 1, closing: 2, closed: 3 };
var DEFAULT_TIMEOUT = 10000;
var CHANNEL_STATES = {
  closed: "closed",
  errored: "errored",
  joined: "joined",
  joining: "joining",
  leaving: "leaving"
};
var CHANNEL_EVENTS = {
  close: "phx_close",
  error: "phx_error",
  join: "phx_join",
  reply: "phx_reply",
  leave: "phx_leave"
};
var TRANSPORTS = {
  longpoll: "longpoll",
  websocket: "websocket"
};

var Push = function () {

  // Initializes the Push
  //
  // channel - The Channel
  // event - The event, for example `"phx_join"`
  // payload - The payload, for example `{user_id: 123}`
  // timeout - The push timeout in milliseconds
  //

  function Push(channel, event, payload, timeout) {
    _classCallCheck(this, Push);

    this.channel = channel;
    this.event = event;
    this.payload = payload || {};
    this.receivedResp = null;
    this.timeout = timeout;
    this.timeoutTimer = null;
    this.recHooks = [];
    this.sent = false;
  }

  _createClass(Push, [{
    key: "resend",
    value: function resend(timeout) {
      this.timeout = timeout;
      this.cancelRefEvent();
      this.ref = null;
      this.refEvent = null;
      this.receivedResp = null;
      this.sent = false;
      this.send();
    }
  }, {
    key: "send",
    value: function send() {
      if (this.hasReceived("timeout")) {
        return;
      }
      this.startTimeout();
      this.sent = true;
      this.channel.socket.push({
        topic: this.channel.topic,
        event: this.event,
        payload: this.payload,
        ref: this.ref
      });
    }
  }, {
    key: "receive",
    value: function receive(status, callback) {
      if (this.hasReceived(status)) {
        callback(this.receivedResp.response);
      }

      this.recHooks.push({ status: status, callback: callback });
      return this;
    }

    // private

  }, {
    key: "matchReceive",
    value: function matchReceive(_ref) {
      var status = _ref.status;
      var response = _ref.response;
      var ref = _ref.ref;

      this.recHooks.filter(function (h) {
        return h.status === status;
      }).forEach(function (h) {
        return h.callback(response);
      });
    }
  }, {
    key: "cancelRefEvent",
    value: function cancelRefEvent() {
      if (!this.refEvent) {
        return;
      }
      this.channel.off(this.refEvent);
    }
  }, {
    key: "cancelTimeout",
    value: function cancelTimeout() {
      clearTimeout(this.timeoutTimer);
      this.timeoutTimer = null;
    }
  }, {
    key: "startTimeout",
    value: function startTimeout() {
      var _this = this;

      if (this.timeoutTimer) {
        return;
      }
      this.ref = this.channel.socket.makeRef();
      this.refEvent = this.channel.replyEventName(this.ref);

      this.channel.on(this.refEvent, function (payload) {
        _this.cancelRefEvent();
        _this.cancelTimeout();
        _this.receivedResp = payload;
        _this.matchReceive(payload);
      });

      this.timeoutTimer = setTimeout(function () {
        _this.trigger("timeout", {});
      }, this.timeout);
    }
  }, {
    key: "hasReceived",
    value: function hasReceived(status) {
      return this.receivedResp && this.receivedResp.status === status;
    }
  }, {
    key: "trigger",
    value: function trigger(status, response) {
      this.channel.trigger(this.refEvent, { status: status, response: response });
    }
  }]);

  return Push;
}();

var Channel = exports.Channel = function () {
  function Channel(topic, params, socket) {
    var _this2 = this;

    _classCallCheck(this, Channel);

    this.state = CHANNEL_STATES.closed;
    this.topic = topic;
    this.params = params || {};
    this.socket = socket;
    this.bindings = [];
    this.timeout = this.socket.timeout;
    this.joinedOnce = false;
    this.joinPush = new Push(this, CHANNEL_EVENTS.join, this.params, this.timeout);
    this.pushBuffer = [];
    this.rejoinTimer = new Timer(function () {
      return _this2.rejoinUntilConnected();
    }, this.socket.reconnectAfterMs);
    this.joinPush.receive("ok", function () {
      _this2.state = CHANNEL_STATES.joined;
      _this2.rejoinTimer.reset();
      _this2.pushBuffer.forEach(function (pushEvent) {
        return pushEvent.send();
      });
      _this2.pushBuffer = [];
    });
    this.onClose(function () {
      _this2.rejoinTimer.reset();
      _this2.socket.log("channel", "close " + _this2.topic + " " + _this2.joinRef());
      _this2.state = CHANNEL_STATES.closed;
      _this2.socket.remove(_this2);
    });
    this.onError(function (reason) {
      if (_this2.isLeaving() || _this2.isClosed()) {
        return;
      }
      _this2.socket.log("channel", "error " + _this2.topic, reason);
      _this2.state = CHANNEL_STATES.errored;
      _this2.rejoinTimer.scheduleTimeout();
    });
    this.joinPush.receive("timeout", function () {
      if (!_this2.isJoining()) {
        return;
      }
      _this2.socket.log("channel", "timeout " + _this2.topic, _this2.joinPush.timeout);
      _this2.state = CHANNEL_STATES.errored;
      _this2.rejoinTimer.scheduleTimeout();
    });
    this.on(CHANNEL_EVENTS.reply, function (payload, ref) {
      _this2.trigger(_this2.replyEventName(ref), payload);
    });
  }

  _createClass(Channel, [{
    key: "rejoinUntilConnected",
    value: function rejoinUntilConnected() {
      this.rejoinTimer.scheduleTimeout();
      if (this.socket.isConnected()) {
        this.rejoin();
      }
    }
  }, {
    key: "join",
    value: function join() {
      var timeout = arguments.length <= 0 || arguments[0] === undefined ? this.timeout : arguments[0];

      if (this.joinedOnce) {
        throw "tried to join multiple times. 'join' can only be called a single time per channel instance";
      } else {
        this.joinedOnce = true;
        this.rejoin(timeout);
        return this.joinPush;
      }
    }
  }, {
    key: "onClose",
    value: function onClose(callback) {
      this.on(CHANNEL_EVENTS.close, callback);
    }
  }, {
    key: "onError",
    value: function onError(callback) {
      this.on(CHANNEL_EVENTS.error, function (reason) {
        return callback(reason);
      });
    }
  }, {
    key: "on",
    value: function on(event, callback) {
      this.bindings.push({ event: event, callback: callback });
    }
  }, {
    key: "off",
    value: function off(event) {
      this.bindings = this.bindings.filter(function (bind) {
        return bind.event !== event;
      });
    }
  }, {
    key: "canPush",
    value: function canPush() {
      return this.socket.isConnected() && this.isJoined();
    }
  }, {
    key: "push",
    value: function push(event, payload) {
      var timeout = arguments.length <= 2 || arguments[2] === undefined ? this.timeout : arguments[2];

      if (!this.joinedOnce) {
        throw "tried to push '" + event + "' to '" + this.topic + "' before joining. Use channel.join() before pushing events";
      }
      var pushEvent = new Push(this, event, payload, timeout);
      if (this.canPush()) {
        pushEvent.send();
      } else {
        pushEvent.startTimeout();
        this.pushBuffer.push(pushEvent);
      }

      return pushEvent;
    }

    // Leaves the channel
    //
    // Unsubscribes from server events, and
    // instructs channel to terminate on server
    //
    // Triggers onClose() hooks
    //
    // To receive leave acknowledgements, use the a `receive`
    // hook to bind to the server ack, ie:
    //
    //     channel.leave().receive("ok", () => alert("left!") )
    //

  }, {
    key: "leave",
    value: function leave() {
      var _this3 = this;

      var timeout = arguments.length <= 0 || arguments[0] === undefined ? this.timeout : arguments[0];

      this.state = CHANNEL_STATES.leaving;
      var onClose = function onClose() {
        _this3.socket.log("channel", "leave " + _this3.topic);
        _this3.trigger(CHANNEL_EVENTS.close, "leave", _this3.joinRef());
      };
      var leavePush = new Push(this, CHANNEL_EVENTS.leave, {}, timeout);
      leavePush.receive("ok", function () {
        return onClose();
      }).receive("timeout", function () {
        return onClose();
      });
      leavePush.send();
      if (!this.canPush()) {
        leavePush.trigger("ok", {});
      }

      return leavePush;
    }

    // Overridable message hook
    //
    // Receives all events for specialized message handling
    // before dispatching to the channel callbacks.
    //
    // Must return the payload, modified or unmodified

  }, {
    key: "onMessage",
    value: function onMessage(event, payload, ref) {
      return payload;
    }

    // private

  }, {
    key: "isMember",
    value: function isMember(topic) {
      return this.topic === topic;
    }
  }, {
    key: "joinRef",
    value: function joinRef() {
      return this.joinPush.ref;
    }
  }, {
    key: "sendJoin",
    value: function sendJoin(timeout) {
      this.state = CHANNEL_STATES.joining;
      this.joinPush.resend(timeout);
    }
  }, {
    key: "rejoin",
    value: function rejoin() {
      var timeout = arguments.length <= 0 || arguments[0] === undefined ? this.timeout : arguments[0];
      if (this.isLeaving()) {
        return;
      }
      this.sendJoin(timeout);
    }
  }, {
    key: "trigger",
    value: function trigger(event, payload, ref) {
      var close = CHANNEL_EVENTS.close;
      var error = CHANNEL_EVENTS.error;
      var leave = CHANNEL_EVENTS.leave;
      var join = CHANNEL_EVENTS.join;

      if (ref && [close, error, leave, join].indexOf(event) >= 0 && ref !== this.joinRef()) {
        return;
      }
      var handledPayload = this.onMessage(event, payload, ref);
      if (payload && !handledPayload) {
        throw "channel onMessage callbacks must return the payload, modified or unmodified";
      }

      this.bindings.filter(function (bind) {
        return bind.event === event;
      }).map(function (bind) {
        return bind.callback(handledPayload, ref);
      });
    }
  }, {
    key: "replyEventName",
    value: function replyEventName(ref) {
      return "chan_reply_" + ref;
    }
  }, {
    key: "isClosed",
    value: function isClosed() {
      return this.state === CHANNEL_STATES.closed;
    }
  }, {
    key: "isErrored",
    value: function isErrored() {
      return this.state === CHANNEL_STATES.errored;
    }
  }, {
    key: "isJoined",
    value: function isJoined() {
      return this.state === CHANNEL_STATES.joined;
    }
  }, {
    key: "isJoining",
    value: function isJoining() {
      return this.state === CHANNEL_STATES.joining;
    }
  }, {
    key: "isLeaving",
    value: function isLeaving() {
      return this.state === CHANNEL_STATES.leaving;
    }
  }]);

  return Channel;
}();

var Socket = exports.Socket = function () {

  // Initializes the Socket
  //
  // endPoint - The string WebSocket endpoint, ie, "ws://example.com/ws",
  //                                               "wss://example.com"
  //                                               "/ws" (inherited host & protocol)
  // opts - Optional configuration
  //   transport - The Websocket Transport, for example WebSocket or Phoenix.LongPoll.
  //               Defaults to WebSocket with automatic LongPoll fallback.
  //   timeout - The default timeout in milliseconds to trigger push timeouts.
  //             Defaults `DEFAULT_TIMEOUT`
  //   heartbeatIntervalMs - The millisec interval to send a heartbeat message
  //   reconnectAfterMs - The optional function that returns the millsec
  //                      reconnect interval. Defaults to stepped backoff of:
  //
  //     function(tries){
  //       return [1000, 5000, 10000][tries - 1] || 10000
  //     }
  //
  //   logger - The optional function for specialized logging, ie:
  //     `logger: (kind, msg, data) => { console.log(`${kind}: ${msg}`, data) }
  //
  //   longpollerTimeout - The maximum timeout of a long poll AJAX request.
  //                        Defaults to 20s (double the server long poll timer).
  //
  //   params - The optional params to pass when connecting
  //
  // For IE8 support use an ES5-shim (https://github.com/es-shims/es5-shim)
  //

  function Socket(endPoint) {
    var _this4 = this;

    var opts = arguments.length <= 1 || arguments[1] === undefined ? {} : arguments[1];

    _classCallCheck(this, Socket);

    this.stateChangeCallbacks = { open: [], close: [], error: [], message: [] };
    this.channels = [];
    this.sendBuffer = [];
    this.ref = 0;
    this.timeout = opts.timeout || DEFAULT_TIMEOUT;
    this.transport = opts.transport || window.WebSocket || LongPoll;
    this.heartbeatIntervalMs = opts.heartbeatIntervalMs || 30000;
    this.reconnectAfterMs = opts.reconnectAfterMs || function (tries) {
      return [1000, 2000, 5000, 10000][tries - 1] || 10000;
    };
    this.logger = opts.logger || function () {}; // noop
    this.longpollerTimeout = opts.longpollerTimeout || 20000;
    this.params = opts.params || {};
    this.endPoint = endPoint + "/" + TRANSPORTS.websocket;
    this.reconnectTimer = new Timer(function () {
      _this4.disconnect(function () {
        return _this4.connect();
      });
    }, this.reconnectAfterMs);
  }

  _createClass(Socket, [{
    key: "protocol",
    value: function protocol() {
      return location.protocol.match(/^https/) ? "wss" : "ws";
    }
  }, {
    key: "endPointURL",
    value: function endPointURL() {
      var uri = Ajax.appendParams(Ajax.appendParams(this.endPoint, this.params), { vsn: VSN });
      if (uri.charAt(0) !== "/") {
        return uri;
      }
      if (uri.charAt(1) === "/") {
        return this.protocol() + ":" + uri;
      }

      return this.protocol() + "://" + location.host + uri;
    }
  }, {
    key: "disconnect",
    value: function disconnect(callback, code, reason) {
      if (this.conn) {
        this.conn.onclose = function () {}; // noop
        if (code) {
          this.conn.close(code, reason || "");
        } else {
          this.conn.close();
        }
        this.conn = null;
      }
      callback && callback();
    }

    // params - The params to send when connecting, for example `{user_id: userToken}`

  }, {
    key: "connect",
    value: function connect(params) {
      var _this5 = this;

      if (params) {
        console && console.log("passing params to connect is deprecated. Instead pass :params to the Socket constructor");
        this.params = params;
      }
      if (this.conn) {
        return;
      }

      this.conn = new this.transport(this.endPointURL());
      this.conn.timeout = this.longpollerTimeout;
      this.conn.onopen = function () {
        return _this5.onConnOpen();
      };
      this.conn.onerror = function (error) {
        return _this5.onConnError(error);
      };
      this.conn.onmessage = function (event) {
        return _this5.onConnMessage(event);
      };
      this.conn.onclose = function (event) {
        return _this5.onConnClose(event);
      };
    }

    // Logs the message. Override `this.logger` for specialized logging. noops by default

  }, {
    key: "log",
    value: function log(kind, msg, data) {
      this.logger(kind, msg, data);
    }

    // Registers callbacks for connection state change events
    //
    // Examples
    //
    //    socket.onError(function(error){ alert("An error occurred") })
    //

  }, {
    key: "onOpen",
    value: function onOpen(callback) {
      this.stateChangeCallbacks.open.push(callback);
    }
  }, {
    key: "onClose",
    value: function onClose(callback) {
      this.stateChangeCallbacks.close.push(callback);
    }
  }, {
    key: "onError",
    value: function onError(callback) {
      this.stateChangeCallbacks.error.push(callback);
    }
  }, {
    key: "onMessage",
    value: function onMessage(callback) {
      this.stateChangeCallbacks.message.push(callback);
    }
  }, {
    key: "onConnOpen",
    value: function onConnOpen() {
      var _this6 = this;

      this.log("transport", "connected to " + this.endPointURL(), this.transport.prototype);
      this.flushSendBuffer();
      this.reconnectTimer.reset();
      if (!this.conn.skipHeartbeat) {
        clearInterval(this.heartbeatTimer);
        this.heartbeatTimer = setInterval(function () {
          return _this6.sendHeartbeat();
        }, this.heartbeatIntervalMs);
      }
      this.stateChangeCallbacks.open.forEach(function (callback) {
        return callback();
      });
    }
  }, {
    key: "onConnClose",
    value: function onConnClose(event) {
      this.log("transport", "close", event);
      this.triggerChanError();
      clearInterval(this.heartbeatTimer);
      this.reconnectTimer.scheduleTimeout();
      this.stateChangeCallbacks.close.forEach(function (callback) {
        return callback(event);
      });
    }
  }, {
    key: "onConnError",
    value: function onConnError(error) {
      this.log("transport", error);
      this.triggerChanError();
      this.stateChangeCallbacks.error.forEach(function (callback) {
        return callback(error);
      });
    }
  }, {
    key: "triggerChanError",
    value: function triggerChanError() {
      this.channels.forEach(function (channel) {
        return channel.trigger(CHANNEL_EVENTS.error);
      });
    }
  }, {
    key: "connectionState",
    value: function connectionState() {
      switch (this.conn && this.conn.readyState) {
        case SOCKET_STATES.connecting:
          return "connecting";
        case SOCKET_STATES.open:
          return "open";
        case SOCKET_STATES.closing:
          return "closing";
        default:
          return "closed";
      }
    }
  }, {
    key: "isConnected",
    value: function isConnected() {
      return this.connectionState() === "open";
    }
  }, {
    key: "remove",
    value: function remove(channel) {
      this.channels = this.channels.filter(function (c) {
        return c.joinRef() !== channel.joinRef();
      });
    }
  }, {
    key: "channel",
    value: function channel(topic) {
      var chanParams = arguments.length <= 1 || arguments[1] === undefined ? {} : arguments[1];

      var chan = new Channel(topic, chanParams, this);
      this.channels.push(chan);
      return chan;
    }
  }, {
    key: "push",
    value: function push(data) {
      var _this7 = this;

      var topic = data.topic;
      var event = data.event;
      var payload = data.payload;
      var ref = data.ref;

      var callback = function callback() {
        return _this7.conn.send(JSON.stringify(data));
      };
      this.log("push", topic + " " + event + " (" + ref + ")", payload);
      if (this.isConnected()) {
        callback();
      } else {
        this.sendBuffer.push(callback);
      }
    }

    // Return the next message ref, accounting for overflows

  }, {
    key: "makeRef",
    value: function makeRef() {
      var newRef = this.ref + 1;
      if (newRef === this.ref) {
        this.ref = 0;
      } else {
        this.ref = newRef;
      }

      return this.ref.toString();
    }
  }, {
    key: "sendHeartbeat",
    value: function sendHeartbeat() {
      if (!this.isConnected()) {
        return;
      }
      this.push({ topic: "phoenix", event: "heartbeat", payload: {}, ref: this.makeRef() });
    }
  }, {
    key: "flushSendBuffer",
    value: function flushSendBuffer() {
      if (this.isConnected() && this.sendBuffer.length > 0) {
        this.sendBuffer.forEach(function (callback) {
          return callback();
        });
        this.sendBuffer = [];
      }
    }
  }, {
    key: "onConnMessage",
    value: function onConnMessage(rawMessage) {
      var msg = JSON.parse(rawMessage.data);
      var topic = msg.topic;
      var event = msg.event;
      var payload = msg.payload;
      var ref = msg.ref;

      this.log("receive", (payload.status || "") + " " + topic + " " + event + " " + (ref && "(" + ref + ")" || ""), payload);
      this.channels.filter(function (channel) {
        return channel.isMember(topic);
      }).forEach(function (channel) {
        return channel.trigger(event, payload, ref);
      });
      this.stateChangeCallbacks.message.forEach(function (callback) {
        return callback(msg);
      });
    }
  }]);

  return Socket;
}();

var LongPoll = exports.LongPoll = function () {
  function LongPoll(endPoint) {
    _classCallCheck(this, LongPoll);

    this.endPoint = null;
    this.token = null;
    this.skipHeartbeat = true;
    this.onopen = function () {}; // noop
    this.onerror = function () {}; // noop
    this.onmessage = function () {}; // noop
    this.onclose = function () {}; // noop
    this.pollEndpoint = this.normalizeEndpoint(endPoint);
    this.readyState = SOCKET_STATES.connecting;

    this.poll();
  }

  _createClass(LongPoll, [{
    key: "normalizeEndpoint",
    value: function normalizeEndpoint(endPoint) {
      return endPoint.replace("ws://", "http://").replace("wss://", "https://").replace(new RegExp("(.*)\/" + TRANSPORTS.websocket), "$1/" + TRANSPORTS.longpoll);
    }
  }, {
    key: "endpointURL",
    value: function endpointURL() {
      return Ajax.appendParams(this.pollEndpoint, { token: this.token });
    }
  }, {
    key: "closeAndRetry",
    value: function closeAndRetry() {
      this.close();
      this.readyState = SOCKET_STATES.connecting;
    }
  }, {
    key: "ontimeout",
    value: function ontimeout() {
      this.onerror("timeout");
      this.closeAndRetry();
    }
  }, {
    key: "poll",
    value: function poll() {
      var _this8 = this;

      if (!(this.readyState === SOCKET_STATES.open || this.readyState === SOCKET_STATES.connecting)) {
        return;
      }

      Ajax.request("GET", this.endpointURL(), "application/json", null, this.timeout, this.ontimeout.bind(this), function (resp) {
        if (resp) {
          var status = resp.status;
          var token = resp.token;
          var messages = resp.messages;

          _this8.token = token;
        } else {
          var status = 0;
        }

        switch (status) {
          case 200:
            messages.forEach(function (msg) {
              return _this8.onmessage({ data: JSON.stringify(msg) });
            });
            _this8.poll();
            break;
          case 204:
            _this8.poll();
            break;
          case 410:
            _this8.readyState = SOCKET_STATES.open;
            _this8.onopen();
            _this8.poll();
            break;
          case 0:
          case 500:
            _this8.onerror();
            _this8.closeAndRetry();
            break;
          default:
            throw "unhandled poll status " + status;
        }
      });
    }
  }, {
    key: "send",
    value: function send(body) {
      var _this9 = this;

      Ajax.request("POST", this.endpointURL(), "application/json", body, this.timeout, this.onerror.bind(this, "timeout"), function (resp) {
        if (!resp || resp.status !== 200) {
          _this9.onerror(status);
          _this9.closeAndRetry();
        }
      });
    }
  }, {
    key: "close",
    value: function close(code, reason) {
      this.readyState = SOCKET_STATES.closed;
      this.onclose();
    }
  }]);

  return LongPoll;
}();

var Ajax = exports.Ajax = function () {
  function Ajax() {
    _classCallCheck(this, Ajax);
  }

  _createClass(Ajax, null, [{
    key: "request",
    value: function request(method, endPoint, accept, body, timeout, ontimeout, callback) {
      if (window.XDomainRequest) {
        var req = new XDomainRequest(); // IE8, IE9
        this.xdomainRequest(req, method, endPoint, body, timeout, ontimeout, callback);
      } else {
        var req = window.XMLHttpRequest ? new XMLHttpRequest() : // IE7+, Firefox, Chrome, Opera, Safari
        new ActiveXObject("Microsoft.XMLHTTP"); // IE6, IE5
        this.xhrRequest(req, method, endPoint, accept, body, timeout, ontimeout, callback);
      }
    }
  }, {
    key: "xdomainRequest",
    value: function xdomainRequest(req, method, endPoint, body, timeout, ontimeout, callback) {
      var _this10 = this;

      req.timeout = timeout;
      req.open(method, endPoint);
      req.onload = function () {
        var response = _this10.parseJSON(req.responseText);
        callback && callback(response);
      };
      if (ontimeout) {
        req.ontimeout = ontimeout;
      }

      // Work around bug in IE9 that requires an attached onprogress handler
      req.onprogress = function () {};

      req.send(body);
    }
  }, {
    key: "xhrRequest",
    value: function xhrRequest(req, method, endPoint, accept, body, timeout, ontimeout, callback) {
      var _this11 = this;

      req.timeout = timeout;
      req.open(method, endPoint, true);
      req.setRequestHeader("Content-Type", accept);
      req.onerror = function () {
        callback && callback(null);
      };
      req.onreadystatechange = function () {
        if (req.readyState === _this11.states.complete && callback) {
          var response = _this11.parseJSON(req.responseText);
          callback(response);
        }
      };
      if (ontimeout) {
        req.ontimeout = ontimeout;
      }

      req.send(body);
    }
  }, {
    key: "parseJSON",
    value: function parseJSON(resp) {
      return resp && resp !== "" ? JSON.parse(resp) : null;
    }
  }, {
    key: "serialize",
    value: function serialize(obj, parentKey) {
      var queryStr = [];
      for (var key in obj) {
        if (!obj.hasOwnProperty(key)) {
          continue;
        }
        var paramKey = parentKey ? parentKey + "[" + key + "]" : key;
        var paramVal = obj[key];
        if ((typeof paramVal === "undefined" ? "undefined" : _typeof(paramVal)) === "object") {
          queryStr.push(this.serialize(paramVal, paramKey));
        } else {
          queryStr.push(encodeURIComponent(paramKey) + "=" + encodeURIComponent(paramVal));
        }
      }
      return queryStr.join("&");
    }
  }, {
    key: "appendParams",
    value: function appendParams(url, params) {
      if (Object.keys(params).length === 0) {
        return url;
      }

      var prefix = url.match(/\?/) ? "&" : "?";
      return "" + url + prefix + this.serialize(params);
    }
  }]);

  return Ajax;
}();

Ajax.states = { complete: 4 };

var Presence = exports.Presence = {
  syncState: function syncState(currentState, newState, onJoin, onLeave) {
    var _this12 = this;

    var state = this.clone(currentState);
    var joins = {};
    var leaves = {};

    this.map(state, function (key, presence) {
      if (!newState[key]) {
        leaves[key] = presence;
      }
    });
    this.map(newState, function (key, newPresence) {
      var currentPresence = state[key];
      if (currentPresence) {
        (function () {
          var newRefs = newPresence.metas.map(function (m) {
            return m.phx_ref;
          });
          var curRefs = currentPresence.metas.map(function (m) {
            return m.phx_ref;
          });
          var joinedMetas = newPresence.metas.filter(function (m) {
            return curRefs.indexOf(m.phx_ref) < 0;
          });
          var leftMetas = currentPresence.metas.filter(function (m) {
            return newRefs.indexOf(m.phx_ref) < 0;
          });
          if (joinedMetas.length > 0) {
            joins[key] = newPresence;
            joins[key].metas = joinedMetas;
          }
          if (leftMetas.length > 0) {
            leaves[key] = _this12.clone(currentPresence);
            leaves[key].metas = leftMetas;
          }
        })();
      } else {
        joins[key] = newPresence;
      }
    });
    return this.syncDiff(state, { joins: joins, leaves: leaves }, onJoin, onLeave);
  },
  syncDiff: function syncDiff(currentState, _ref2, onJoin, onLeave) {
    var joins = _ref2.joins;
    var leaves = _ref2.leaves;

    var state = this.clone(currentState);
    if (!onJoin) {
      onJoin = function onJoin() {};
    }
    if (!onLeave) {
      onLeave = function onLeave() {};
    }

    this.map(joins, function (key, newPresence) {
      var currentPresence = state[key];
      state[key] = newPresence;
      if (currentPresence) {
        var _state$key$metas;

        (_state$key$metas = state[key].metas).unshift.apply(_state$key$metas, _toConsumableArray(currentPresence.metas));
      }
      onJoin(key, currentPresence, newPresence);
    });
    this.map(leaves, function (key, leftPresence) {
      var currentPresence = state[key];
      if (!currentPresence) {
        return;
      }
      var refsToRemove = leftPresence.metas.map(function (m) {
        return m.phx_ref;
      });
      currentPresence.metas = currentPresence.metas.filter(function (p) {
        return refsToRemove.indexOf(p.phx_ref) < 0;
      });
      onLeave(key, currentPresence, leftPresence);
      if (currentPresence.metas.length === 0) {
        delete state[key];
      }
    });
    return state;
  },
  list: function list(presences, chooser) {
    if (!chooser) {
      chooser = function chooser(key, pres) {
        return pres;
      };
    }

    return this.map(presences, function (key, presence) {
      return chooser(key, presence);
    });
  },

  // private

  map: function map(obj, func) {
    return Object.getOwnPropertyNames(obj).map(function (key) {
      return func(key, obj[key]);
    });
  },
  clone: function clone(obj) {
    return JSON.parse(JSON.stringify(obj));
  }
};

// Creates a timer that accepts a `timerCalc` function to perform
// calculated timeout retries, such as exponential backoff.
//
// ## Examples
//
//    let reconnectTimer = new Timer(() => this.connect(), function(tries){
//      return [1000, 5000, 10000][tries - 1] || 10000
//    })
//    reconnectTimer.scheduleTimeout() // fires after 1000
//    reconnectTimer.scheduleTimeout() // fires after 5000
//    reconnectTimer.reset()
//    reconnectTimer.scheduleTimeout() // fires after 1000
//

var Timer = function () {
  function Timer(callback, timerCalc) {
    _classCallCheck(this, Timer);

    this.callback = callback;
    this.timerCalc = timerCalc;
    this.timer = null;
    this.tries = 0;
  }

  _createClass(Timer, [{
    key: "reset",
    value: function reset() {
      this.tries = 0;
      clearTimeout(this.timer);
    }

    // Cancels any previous scheduleTimeout and schedules callback

  }, {
    key: "scheduleTimeout",
    value: function scheduleTimeout() {
      var _this13 = this;

      clearTimeout(this.timer);

      this.timer = setTimeout(function () {
        _this13.tries = _this13.tries + 1;
        _this13.callback();
      }, this.timerCalc(this.tries + 1));
    }
  }]);

  return Timer;
}();

})(typeof(exports) === "undefined" ? window.Phoenix = window.Phoenix || {} : exports);
  })();
});
require.register("web/static/js/app.js", function(exports, require, module) {
'use strict';

Object.defineProperty(exports, "__esModule", {
	value: true
});
exports.Chat = undefined;

var _phoenix = require('phoenix');

var Chat = exports.Chat = {
	channel: null,
	globalChannel: null,
	presences: {},
	init: function init() {
		$(document).on('click', '.cs-chat-item', function () {
			var $chatbox = $('#cs-chat-box');
			var currentConversationId = $chatbox.attr('data-conversation');
			var csName = $(this).attr('data-name');
			var cid = $(this).attr('data-cid');

			if (IS_LOGGED_IN) {
				$.ajax({
					url: URL_GET_CONVERSATION,
					data: { csId: cid },
					type: "POST",
					dataType: "json",
					success: function success(data) {
						if (data.success == true) {
							window.sender_name = data.name;
							if (currentConversationId != data.conversationId) {
								$chatbox.find('.widget-content').off('scroll');
								$chatbox.find('.widget-content').html('');
								$chatbox.attr('data-conversation', data.conversationId);
								var chat_open = { csName: csName, conversation: data.conversationId };
								$.cookie('chat_open', JSON.stringify(chat_open), { path: '/' });
								Chat.openChatBox(data.conversationId, csName);
							}
						}
					}
				});
			} else {
				console.log('guest chat');
				$chatbox.find('.widget-content').off('scroll');
				$chatbox.find('.widget-content').html('');
				Chat.registerGuest(csName, cid);
			}

			return false;
		});

		$('.btn-start-chat').click(function () {
			var $btnStartChat = $(this);
			var name = $('#input-guest-name').val();
			var phone = $('#input-guest-phone').val();
			var cid = $('.widget-guest-info').attr('data-cid');
			var username = $('.widget-guest-info').attr('data-name');

			if (name == '' || phone == '') {
				alert('Bạn phải nhập thông tin tên và số điện thoại.');
				return false;
			}

			$.ajax({
				type: 'POST',
				url: URL_START_GUEST_CHAT,
				dataType: 'json',
				data: { name: name, phone: phone, cid: cid },
				beforeSend: function beforeSend() {
					$btnStartChat.find('#start-chat-loading').show();
				},
				success: function success(data) {
					if (data.success == true) {
						$.cookie('visitor_name', name, { path: '/', expires: 365 });
						$.cookie('visitor_phone', phone, { path: '/', expires: 365 });
						window.sender_name = name;
						$('.widget-guest-info').hide();
						Chat.openChatBox(data.conversationId, username);
					}
				},
				complete: function complete() {
					$btnStartChat.find('#start-chat-loading').hide();
				}
			});
		});

		$('#chat-input').on('keydown', function (e) {
			if (e.which == 13) {
				if (!e.shiftKey) {

					if ($(this).val() == "") {
						e.preventDefault();
						return false;
					}

					Chat.sendMessage($(this));
					$(this).val('');
					$(this).height(40);
					e.preventDefault();
				}
			}
		}).on('input', function () {
			$(this).height(1);
			var totalHeight = $(this).prop('scrollHeight') - parseInt($(this).css('padding-top')) - parseInt($(this).css('padding-bottom'));
			if (totalHeight > 80) totalHeight = 80;
			$(this).height(totalHeight);
			$(this).closest('.chat-box').find('.widget-content').height(300 - (totalHeight - 50) - 56);
		});

		$('#chat-input').on('focus', function () {
			var $chatBox = $('#cs-chat-box');
			var conversationId = $chatBox.attr('data-conversation');
			Chat.seenChat(conversationId);
		});

		$('.notification-block-message-link').click(function () {
			$('.notification-message-details .details-popup-content').html('');
			Chat.getListConversation();
		});

		$('.notification-message-details').on('click', '.message-item', function () {
			var conversationId = $(this).attr('data-conversation');
			var name = $(this).attr('data-name');
			$('.notification-message-details').hide();
			Chat.openChatBox(conversationId, name);

			var currentCount = $('#count-chat-notify').text();
			if (isNaN(currentCount) || currentCount == '') {
				currentCount = 0;
				$('#count-chat-notify').text(currentCount);
			} else {
				currentCount = parseInt(currentCount);
				$('#count-chat-notify').text(--currentCount);
			}
			if (currentCount > 0) {
				$('#count-chat-notify').show();
			} else {
				$('#count-chat-notify').hide();
			}

			return false;
		});

		$('#chat-box-title').click(function () {
			$('#cs-chat-box').toggleClass('minimize');
			if (!$('#cs-chat-box').hasClass('minimize')) {
				$('#chat-input').focus();
			}
		});

		$('#photo-upload').fileupload({
			url: CHAT_UPLOAD_URL,
			dataType: 'json',
			done: function done(e, data) {
				if (data.result.success == true) {
					Chat.sendMessage($('#chat-input'), data.result.attachments);
				} else {
					console.log('upload failed');
				}
			},
			progressall: function progressall(e, data) {
				var progress = parseInt(data.loaded / data.total * 100, 10);
				//console.log(progress + '%');
			}
		}).prop('disabled', !$.support.fileInput).parent().addClass($.support.fileInput ? undefined : 'disabled');
	},

	sendMessage: function sendMessage(ele, attachments) {
		if (typeof attachments == 'undefined') attachments = [];
		var conversationId = $(ele).closest('.chat-box').attr('data-conversation');
		var body = $(ele).val();
		if (body.length > 0 || attachments != '') {
			//attachments = '';
			var username = window.sender_name;
			if (username == '') {
				username = $.cookie('visitor_name');
			}
			Chat.channel.push("new:msg", { senderId: window.sender_id, senderName: window.sender_name, conversationId: conversationId, message: $(ele).val(), attachments: attachments });
			$(ele).val('');
		}
	},

	openChatBox: function openChatBox(conversationId, username) {
		var $chatBox = $('#cs-chat-box');
		$chatBox.find('.widget-content').off('scroll');
		$chatBox.find('.widget-content').html('');

		$chatBox.attr('data-conversation', conversationId);

		var chat_open = { csName: username, conversation: conversationId };
		$.cookie('chat_open', JSON.stringify(chat_open), { path: '/' });
		$chatBox.find('.title').text(username);
		$chatBox.removeClass('minimize');
		$chatBox.show();
		Chat.getLogChat($chatBox, 0);
		$('#chat-input').focus();
	},

	getLogChat: function getLogChat(chatbox, offset) {
		var conversationId = chatbox.attr('data-conversation');
		Chat.channel.push("chat_history:get", { conversationId: conversationId, offset: offset });
		chatbox.find('.chat-loading').show();
	},

	getTotalUnread: function getTotalUnread() {
		Chat.channel.push("chat_unread:get", {});
	},

	seenChat: function seenChat(conversationId) {
		Chat.channel.push("seen_chat", { conversationId: conversationId });
	},

	getListConversation: function getListConversation() {
		Chat.channel.push("list_conversation:get", { limit: 10 });
	},

	registerGuest: function registerGuest(csName, cid) {
		var visitorName = $.cookie('visitor_name');
		var phone = $.cookie('visitor_phone');
		var vid = $.cookie('vid');
		if (typeof vid != 'undefined' && !isNaN(vid) && typeof visitorName != 'undefined' && visitorName != '' && typeof phone != 'undefined' && phone != '') {
			$.ajax({
				url: URL_GET_CONVERSATION,
				data: { csId: cid },
				type: "POST",
				dataType: "json",
				success: function success(data) {
					window.sender_name = data.name;
					Chat.openChatBox(data.conversationId, csName);
				}
			});
		} else {
			$('.widget-guest-info').show();
			$('.widget-guest-info').attr('data-cid', cid);
			$('.widget-guest-info').attr('data-name', csName);
		}
	},

	connect: function connect() {
		var socket = new _phoenix.Socket(window.socketURL, {
			params: { token: window.userToken }
		});

		socket.connect();

		socket.onOpen(function (ev) {
			// Enable Chat Window
			return;
		});
		socket.onClose(function (e) {
			// Disable Chat Window
			Chat.channel = null;
			return;
		});

		var globalChannel = socket.channel('users:global', {});

		globalChannel.join().receive("ignore", function () {
			// Disable Chat Window
			return;
		}).receive("ok", function () {
			// Enable Chat Window
			Chat.globalChannel = globalChannel;
			return;
		});

		globalChannel.onClose(function (e) {
			// Disable Chat Window
			Chat.globalChannel = null;
			return;
		});
		globalChannel.on("global:listcs", function (data) {
			$('li.cs-chat-item').removeClass('online');
			$('li.cs-chat-item').find('.cs-title').text('Trạng thái: tạm vắng');
			var users = data.list;
			for (var i = 0; i < users.length; i++) {
				$('#cs-chat-item-' + users[i]).addClass('online');
				$('#cs-chat-item-' + users[i]).find('.cs-title').text('Trạng thái: đang online');
			}
		});

		globalChannel.on("presence_state", function (state) {
			Chat.presences = _phoenix.Presence.syncState(Chat.presences, state);
			
			$('li.cs-chat-item').removeClass('online');
			//$('li.cs-chat-item').find('.cs-title').text('Trạng thái: tạm vắng');
			
			for (var csId in Chat.presences) {
				if(!Chat.presences.hasOwnProperty(csId)) continue;

                var $csItem = $('#cs-chat-item-' + csId);
                if(!$csItem.hasClass('is-busy')) {
                    $('#cs-chat-item-' + csId).addClass('online');
                }
				//$('#cs-chat-item-' + csId).find('.cs-title').text('Trạng thái: đang online');
			}
		});

		globalChannel.on("presence_diff", function (diff) {
			Chat.presences = _phoenix.Presence.syncDiff(Chat.presences, diff);

            $('li.cs-chat-item').removeClass('online');
            //$('li.cs-chat-item').find('.cs-title').text('Trạng thái: tạm vắng');

            for (var csId in Chat.presences) {
                if(!Chat.presences.hasOwnProperty(csId)) continue;

                var $csItem = $('#cs-chat-item-' + csId);
                if(!$csItem.hasClass('is-busy')) {
                    $('#cs-chat-item-' + csId).addClass('online');
                }
                //$('#cs-chat-item-' + csId).find('.cs-title').text('Trạng thái: đang online');
            }
		});

		var chan = socket.channel(window.userChannel, {});

		chan.join().receive("ignore", function () {
			// Disable Chat Window
			return;
		}).receive("ok", function () {
			// Enable Chat Window
			Chat.channel = chan;
			Chat.getTotalUnread();
			var $chatbox = $('#cs-chat-box');
			var display = $chatbox.css('display');
			if (display == 'block') {
				Chat.getLogChat($chatbox, 0);
			}

			return;
		});

		chan.onClose(function (e) {
			// Disable Chat Window
			Chat.channel = null;
			return;
		});

		chan.on("new:msg", function (msg) {
			if (msg.direction != 'me') Chat.playSoundNotify();
			var conversationId = msg.conversationId;
			var isUnread = msg.is_unread;

			var $chatbox = $('#cs-chat-box');
			var display = $chatbox.css('display');

			var showChatNotification = false;
			if (display == 'block') {
				var currentConversationId = $chatbox.attr('data-conversation');
				if (currentConversationId == conversationId) {
					// Add message to Chat box
					var html = Chat.messageTemplate(msg);
					var $widgetContent = $chatbox.find('.widget-content');
					$widgetContent.append(html);
					$widgetContent.scrollTop($widgetContent[0].scrollHeight);
					if (!$('#chat-input').is(":focus")) {
						showChatNotification = true;
					}
				} else {
					showChatNotification = true;
				}
			} else {
				showChatNotification = true;
			}

			if (showChatNotification) {
				Chat.openChatBox(conversationId, msg.senderName);
				Chat.getTotalUnread();
			}
		});

		chan.on("listcs:received", function (data) {
			$('li.cs-chat-item').removeClass('online');
			$('li.cs-chat-item').find('.cs-title').text('Trạng thái: tạm vắng');
			var users = data.list;
			for (var i = 0; i < users.length; i++) {
				$('#cs-chat-item-' + users[i]).addClass('online');
				$('#cs-chat-item-' + users[i]).find('.cs-title').text('Trạng thái: đang online');
			}
		});

		chan.on("chat_history:received", function (data) {
			var $chatbox = $('#cs-chat-box');
			$chatbox.find('.chat-loading').hide();
			var histories = data.history;
			var $widgetContent = $chatbox.find('.widget-content');
			var oldHeight = $widgetContent[0].scrollHeight;
			for (var i = 0; i < histories.length; i++) {
				var html = Chat.historyTemplate(histories[i]);
				$widgetContent.prepend(html);
				if (data.offset == 0) {
					$widgetContent.scrollTop($widgetContent[0].scrollHeight);
				} else {
					var newHeight = $widgetContent[0].scrollHeight;
					$widgetContent.scrollTop(newHeight - oldHeight);
				}
			}

			$('#chat-message-container').off('scroll').scroll(function () {
				var scrollTop = $(this).scrollTop();
				if (scrollTop == 0) {
					var $el = $(this).find('.message-row').first();
					if ($el.length > 0) {
						var offset = parseInt($el.attr('data-offset'));
						var $chatbox = $('#cs-chat-box');
						Chat.getLogChat($chatbox, offset);
					}
				}
			});
		});

		chan.on("chat_unread:received", function (data) {
			$('#count-chat-notify').text(data.total_unread);
			if (data.total_unread > 0) {
				$('#count-chat-notify').show();
			} else {
				$('#count-chat-notify').hide();
			}
		});

		chan.on("list_conversation:received", function (data) {
			var list = data.list;
			var html = '<ul class="list-message">';
			for (var i = 0; i < list.length; i++) {
				var item = list[i];
				var itemClass = "message-item";
				if (item.is_unread == 1) {
					itemClass = "message-item message-item-unread";
				}
				html += '<li class="' + itemClass + '" data-conversation="' + item.conversationId + '" data-name="' + item.name + '">' + '	<div class="message-item-header">' + '		<span class="message-username">' + item.name + '</span>' + '		<span class="message-time">' + item.time + '</span>' + '	</div>' + '	<span class="message-content">' + item.message + '	</span>' + '</li>';
			}

			html += '</ul>';
			$('.notification-message-details .details-popup-content').html(html);
		});

		chan.on("seen_chat:ok", function (data) {
			$('#count-chat-notify').text(data.total_unread);
			if (data.total_unread > 0) {
				$('#count-chat-notify').show();
			} else {
				$('#count-chat-notify').hide();
			}
		});
	},
	historyTemplate: function historyTemplate(history) {
		var message = JSON.parse(history.message);
		var attachments = message.attachments;

		var messageContent = message.message;
		if (messageContent == "" && attachments.length == 0) return '';

		if (attachments.length > 0) {
			messageContent = '';
			for (var i = 0, length = attachments.length; i < length; i++) {
				if (attachments[i].attach_type == 'image') {
					messageContent += '<a href="' + attachments[i].url + '" target="_blank"><img src="' + attachments[i].url + '" style="width: 200px;" /></a>';
				} else {
					messageContent += '<a href="' + attachments[i].url + '" target="_blank" style="width: 200px;">' + attachments[i].name + '</a>';
				}
			}
		} else {
			messageContent = Chat.parseMessage(messageContent);
		}

		var html = '';
		html += '<div class="message-row message-row-' + '" data-offset=' + history.offset + '>' + '	<div class="message-info message-info-' + history.direction + '">' + '		<span class="message-username">' + history.name + '</span> - <span class="message-time">' + message.display_time + '</span>' + '	</div>' + '	<div class="message-box message-box-' + history.direction + '">' + messageContent + '	</div>' + '</div>';

		return html;
	},
	messageTemplate: function messageTemplate(msg) {
		var message = msg.message;
		var attachments = msg.attachments;
		if (attachments.length > 0) {
			message = '';
			for (var i = 0, length = attachments.length; i < length; i++) {
				if (attachments[i].attach_type == 'image') {
					message += '<a href="' + attachments[i].url + '" target="_blank"><img src="' + attachments[i].url + '" style="width: 200px;" /></a>';
				} else {
					message += '<a href="' + attachments[i].url + '" target="_blank" style="width: 200px;">' + attachments[i].name + '</a>';
				}
			}
		} else {
			message = Chat.parseMessage(message);
		}

		var html = '';
		html += '<div class="message-row message-row-' + msg.direction + '" data-offset=' + msg.offset + '>' + '	<div class="message-info message-info-' + msg.direction + '">' + '		<span class="message-username">' + msg.senderName + '</span> - <span class="message-time">' + msg.display_time + '</span>' + '	</div>' + '	<div class="message-box message-box-' + msg.direction + '">' + message + '	</div>' + '</div>';

		return html;
	},
	parseMessage: function parseMessage(inputText) {
		var replacedText, replacePattern1, replacePattern2, replacePattern3;

		//URLs starting with http://, https://, or ftp://
		replacePattern1 = /(\b(https?|ftp):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/gim;
		replacedText = inputText.replace(replacePattern1, '<a href="$1" target="_blank">$1</a>');

		//URLs starting with "www." (without // before it, or it'd re-link the ones done above).
		replacePattern2 = /(^|[^\/])(www\.[\S]+(\b|$))/gim;
		replacedText = replacedText.replace(replacePattern2, '$1<a href="http://$2" target="_blank">$2</a>');

		//Change email addresses to mailto:: links.
		replacePattern3 = /(([a-zA-Z0-9\-\_\.])+@[a-zA-Z\_]+?(\.[a-zA-Z]{2,6})+)/gim;
		replacedText = replacedText.replace(replacePattern3, '<a href="mailto:$1">$1</a>');

		replacedText = replacedText.replace(/(?:\r\n|\r|\n)/g, '<br />');

		return replacedText;
	},
	playSoundNotify: function playSoundNotify() {
		var audioElement = document.createElement('audio');
		audioElement.setAttribute('src', CHAT_SOUND_PATH);
		audioElement.play();
	}
};
});

;require.alias("phoenix/priv/static/phoenix.js", "phoenix");require.register("___globals___", function(exports, require, module) {
  
});})();require('___globals___');

require('web/static/js/app');
//# sourceMappingURL=app.js.map
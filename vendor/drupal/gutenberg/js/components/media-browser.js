/**
* DO NOT EDIT THIS FILE.
* See the following change record for more information,
* https://www.drupal.org/node/2815083
* @preserve
**/'use strict';

var _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; };

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _asyncToGenerator(fn) { return function () { var gen = fn.apply(this, arguments); return new Promise(function (resolve, reject) { function step(key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { return Promise.resolve(value).then(function (value) { step("next", value); }, function (err) { step("throw", err); }); } } return step("next"); }); }; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

(function (wp, Drupal, DrupalGutenberg, drupalSettings) {
  var components = wp.components,
      element = wp.element,
      editor = wp.editor;
  var Component = element.Component,
      Fragment = element.Fragment;
  var MediaBrowserDetails = DrupalGutenberg.Components.MediaBrowserDetails;
  var Button = components.Button,
      FormFileUpload = components.FormFileUpload;
  var mediaUpload = editor.mediaUpload;


  var __ = Drupal.t;

  var MediaBrowser = function (_Component) {
    _inherits(MediaBrowser, _Component);

    function MediaBrowser() {
      _classCallCheck(this, MediaBrowser);

      var _this = _possibleConstructorReturn(this, (MediaBrowser.__proto__ || Object.getPrototypeOf(MediaBrowser)).apply(this, arguments));

      _this.state = {
        data: [],
        selected: {},
        active: null,
        search: ''
      };
      _this.uploadFromFiles = _this.uploadFromFiles.bind(_this);
      _this.addFiles = _this.addFiles.bind(_this);
      _this.selectMedia = _this.selectMedia.bind(_this);
      _this.toggleMedia = _this.toggleMedia.bind(_this);
      _this.uncheckMedia = _this.uncheckMedia.bind(_this);
      return _this;
    }

    _createClass(MediaBrowser, [{
      key: 'componentWillMount',
      value: function componentWillMount() {
        this.getMediaFiles();
      }
    }, {
      key: 'componentDidMount',
      value: function componentDidMount() {
        var _props = this.props,
            multiple = _props.multiple,
            value = _props.value;

        var selected = {} && (multiple && value ? _extends({}, value.reduce(function (result, item) {
          result[item] = true;
          return result;
        }, {})) : _defineProperty({}, value, true));

        this.setState({
          selected: selected,
          active: Object.keys(selected)[0]
        });
      }
    }, {
      key: 'getMediaFiles',
      value: function getMediaFiles() {
        var _this2 = this;

        var allowedTypes = this.props.allowedTypes;


        if (allowedTypes.length === 0) {
          allowedTypes.push('*');
        }

        fetch('\n        ' + drupalSettings.path.baseUrl + 'editor/media/search/' + allowedTypes.join('+') + '/*').then(function (response) {
          return response.json();
        }).then(function (json) {
          _this2.setState({ data: json });
        });
      }
    }, {
      key: 'uploadFromFiles',
      value: function uploadFromFiles(event) {
        this.addFiles(event.target.files);
      }
    }, {
      key: 'addFiles',
      value: function addFiles(files) {
        var _this3 = this;

        var allowedTypes = this.props.allowedTypes;


        mediaUpload({
          allowedTypes: allowedTypes,
          filesList: files,
          onFileChange: function onFileChange() {
            _this3.getMediaFiles();
          }
        });
      }
    }, {
      key: 'selectMedia',
      value: function () {
        var _ref2 = _asyncToGenerator(regeneratorRuntime.mark(function _callee2() {
          var _this4 = this;

          var _state, selected, data, onSelect, medias;

          return regeneratorRuntime.wrap(function _callee2$(_context2) {
            while (1) {
              switch (_context2.prev = _context2.next) {
                case 0:
                  _state = this.state, selected = _state.selected, data = _state.data;
                  onSelect = this.props.onSelect;
                  medias = data.filter(function (item) {
                    return selected[item.id];
                  });


                  medias.map(function () {
                    var _ref3 = _asyncToGenerator(regeneratorRuntime.mark(function _callee(media) {
                      var title, caption, alt_text;
                      return regeneratorRuntime.wrap(function _callee$(_context) {
                        while (1) {
                          switch (_context.prev = _context.next) {
                            case 0:
                              title = { raw: null, rendered: null };
                              caption = { raw: null, rendered: null };


                              if (typeof media.title === 'string') {
                                title.raw = media.title;
                              } else if (media.title && media.title.raw) {
                                title.raw = media.title.raw;
                                media.title = media.title.raw;
                              } else if (!media.title.raw) {
                                media.title = '';
                              }

                              if (typeof media.caption === 'string') {
                                caption.raw = media.caption;
                              } else if (media.caption && media.caption.raw) {
                                caption.raw = media.caption.raw;
                                media.caption = media.caption.raw;
                              } else if (!media.caption.raw) {
                                media.caption = '';
                              }

                              alt_text = media.alt_text;
                              _context.next = 7;
                              return fetch(drupalSettings.path.baseUrl + 'editor/media/update_data/' + media.id, {
                                method: 'post',
                                body: JSON.stringify({
                                  title: title.raw,
                                  caption: caption.raw,
                                  alt_text: alt_text
                                })
                              });

                            case 7:
                            case 'end':
                              return _context.stop();
                          }
                        }
                      }, _callee, _this4);
                    }));

                    return function (_x) {
                      return _ref3.apply(this, arguments);
                    };
                  }());

                  onSelect(medias);

                case 5:
                case 'end':
                  return _context2.stop();
              }
            }
          }, _callee2, this);
        }));

        function selectMedia() {
          return _ref2.apply(this, arguments);
        }

        return selectMedia;
      }()
    }, {
      key: 'toggleMedia',
      value: function toggleMedia(ev, id) {
        var _state2 = this.state,
            selected = _state2.selected,
            active = _state2.active;
        var multiple = this.props.multiple;

        this.setState({ active: id });

        if (multiple) {
          this.setState({
            selected: _extends({}, selected, _defineProperty({}, id, active === id ? !selected[id] : true))
          });
        } else {
          this.setState({
            selected: _defineProperty({}, id, active === id ? !selected[id] : true)
          });
        }
      }
    }, {
      key: 'uncheckMedia',
      value: function uncheckMedia(ev, id) {
        var selected = this.state.selected;
        var multiple = this.props.multiple;


        if (multiple) {
          this.setState({
            selected: _extends({}, selected, _defineProperty({}, id, false))
          });
        }

        ev.stopPropagation();
      }
    }, {
      key: 'render',
      value: function render() {
        var _this5 = this;

        var _state3 = this.state,
            data = _state3.data,
            selected = _state3.selected,
            active = _state3.active,
            search = _state3.search;
        var multiple = this.props.multiple;


        var getMedia = function getMedia(id) {
          return data.filter(function (item) {
            return item.id === id;
          })[0];
        };
        var activeMedia = getMedia(active);

        function updateMedia(attributes) {
          var title = attributes.title,
              altText = attributes.altText,
              caption = attributes.caption;


          activeMedia.title = title;

          if (caption) {
            activeMedia.caption = caption;
          }

          activeMedia.alt_text = altText;
          activeMedia.alt = altText;
        }

        return React.createElement(
          'div',
          { className: 'media-browser' },
          React.createElement(
            'div',
            { className: 'content' },
            React.createElement(
              'div',
              { className: 'toolbar' },
              React.createElement(
                'div',
                { className: 'form-item' },
                React.createElement('input', {
                  name: 'media-browser-search',
                  className: 'text-full',
                  placeHolder: __('Search'),
                  type: 'text',
                  onChange: function onChange(value) {
                    _this5.setState({ search: value.target.value.toLowerCase() });
                  }
                })
              )
            ),
            React.createElement(
              'ul',
              { className: 'list' },
              data.filter(function (item) {
                return item.media_details.file.toLowerCase().includes(search) || item.title && item.title.raw && typeof item.title.raw === 'string' && item.title.raw.toLowerCase().includes(search);
              }).map(function (media, index) {
                return React.createElement(
                  'li',
                  {
                    tabIndex: index,

                    role: 'checkbox',
                    onClick: function onClick(ev) {
                      return _this5.toggleMedia(ev, media.id);
                    },
                    'aria-label': media.filename,
                    'aria-checked': 'true',
                    'data-id': media.id,
                    className: 'attachment save-ready ' + (active === media.id ? 'details' : '') + ' ' + (selected[media.id] ? 'selected' : '')
                  },
                  React.createElement(
                    'div',
                    {
                      className: ['attachment-preview', 'js--select-attachment', 'type-' + media.media_type, 'subtype-' + media.mime_type.split('/')[1], media.media_details.width < media.media_details.height ? 'portrait' : 'landscape'].join(' ')
                    },
                    React.createElement(
                      'div',
                      { className: 'thumbnail' },
                      React.createElement(
                        'div',
                        { className: 'centered' },
                        media.media_type === 'image' && React.createElement('img', {
                          src: media.media_details.sizes && media.media_details.sizes.large ? media.media_details.sizes.large.source_url : media.source_url,
                          draggable: 'false',
                          alt: media.filename
                        })
                      ),
                      media.media_type !== 'image' && React.createElement(
                        'div',
                        { className: 'filename' },
                        media.media_details.file
                      )
                    )
                  ),
                  React.createElement(
                    'button',
                    {
                      type: 'button',
                      className: 'check',
                      tabIndex: index,
                      onClick: function onClick(ev) {
                        return _this5.uncheckMedia(ev, media.id);
                      }
                    },
                    React.createElement('span', { className: 'media-modal-icon' }),
                    React.createElement(
                      'span',
                      { className: 'screen-reader-text' },
                      'Deselect'
                    )
                  )
                );
              })
            ),
            React.createElement(
              'div',
              { className: 'media-details' },
              activeMedia && React.createElement(
                Fragment,
                null,
                React.createElement(
                  'h2',
                  null,
                  __('Media details')
                ),
                React.createElement(MediaBrowserDetails, {
                  key: activeMedia.id,
                  onChange: updateMedia,
                  media: activeMedia
                })
              )
            )
          ),
          React.createElement(
            'div',
            { className: 'form-actions' },
            multiple && React.createElement(
              'div',
              { className: 'selected-summary' },
              __('Total selected') + ': ' + Object.values(selected).filter(function (item) {
                return item;
              }).length
            ),
            React.createElement(
              'div',
              { className: 'buttons' },
              React.createElement(
                FormFileUpload,
                {
                  isLarge: true,
                  className: 'editor-media-placeholder__button',
                  onChange: this.uploadFromFiles,
                  accept: 'image',
                  multiple: multiple
                },
                __('Upload')
              ),
              React.createElement(
                Button,
                {
                  isLarge: true,
                  disabled: Object.values(selected).filter(function (item) {
                    return item;
                  }).length === 0,
                  isPrimary: true,
                  onClick: this.selectMedia
                },
                __('Select')
              )
            )
          )
        );
      }
    }]);

    return MediaBrowser;
  }(Component);

  MediaBrowser.defaultProps = {
    allowedTypes: ['image']
  };

  window.DrupalGutenberg = window.DrupalGutenberg || {};
  window.DrupalGutenberg.Components = window.DrupalGutenberg.Components || {};
  window.DrupalGutenberg.Components.MediaBrowser = MediaBrowser;
})(wp, Drupal, DrupalGutenberg, drupalSettings);
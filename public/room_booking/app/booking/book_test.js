'use strict';

describe('myApp.book module', function() {

  beforeEach(module('myApp.book'));

  describe('book controller', function(){

    it('should ....', inject(function($controller) {
      var BookCtrl = $controller('BookCtrl');
      expect(bookCtrl).toBeDefined();
    }));

  });
});
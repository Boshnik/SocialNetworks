var SocialNetworks = function (config) {
    config = config || {};
    SocialNetworks.superclass.constructor.call(this, config);
};
Ext.extend(SocialNetworks, Ext.Component, {
    page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, view: {}, utils: {}
});
Ext.reg('socialnetworks', SocialNetworks);

SocialNetworks = new SocialNetworks();
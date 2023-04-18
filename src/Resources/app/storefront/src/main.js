//Import all necessary Storefront plugins
import addProjectRoute from "./add-project-route/index";

// Register your plugin via the existing PluginManager
const PluginManager = window.PluginManager;
PluginManager.register('addProjectRoute', addProjectRoute);

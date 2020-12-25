<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* @boom/logo/logo.twig */
class __TwigTemplate_dce3599ad01ee509c6960396d464a47950efe14c08988e754cf57b9c73a70ecf extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"70\" height=\"100\" viewBox=\"0 0 186.52541 243.71308\"><title>Risorsa 85</title><g id=\"Livello_2\" data-name=\"Livello 2\"><g id=\"Livello_1-2\" data-name=\"Livello 1\"><path d=\"M131.64024,51.90954C114.49124,34.76866,98.12945,18.42858,93.26,0,88.39024,18.42858,72.02583,34.76866,54.8797,51.90954,29.16037,77.61263,0,106.7432,0,150.434a93.26271,93.26271,0,1,0,186.52541,0c0-43.688-29.158-72.8214-54.88517-98.52449M39.63956,172.16578c-5.71847-.19418-26.82308-36.57089,12.32937-75.303l25.90873,28.30088a2.21467,2.21467,0,0,1-.173,3.30485c-6.18245,6.34085-32.53369,32.7658-35.809,41.90292-.676,1.886-1.66339,1.81463-2.25619,1.79436M93.26283,220.1092a32.07521,32.07521,0,0,1-32.07544-32.07543A33.42322,33.42322,0,0,1,69.1821,166.8471c5.7836-7.07224,24.07643-26.96358,24.07643-26.96358s18.01279,20.18332,24.03326,26.89607a31.36794,31.36794,0,0,1,8.04647,21.25418A32.07551,32.07551,0,0,1,93.26283,220.1092m61.3923-52.015c-.69131,1.51192-2.25954,4.036-4.37617,4.113-3.77288.13741-4.176-1.79579-6.96465-5.92291-6.12235-9.06007-59.55167-64.89991-69.54517-75.69925-8.79026-9.49851-1.23783-16.195,2.26549-19.70431C80.42989,66.47768,93.25949,53.656,93.25949,53.656s38.25479,36.29607,54.19029,61.09626,10.44364,46.26024,7.20535,53.342\" style=\"fill:#009cde\"/></g></g></svg>
";
    }

    public function getTemplateName()
    {
        return "@boom/logo/logo.twig";
    }

    public function getDebugInfo()
    {
        return array (  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@boom/logo/logo.twig", "/var/www/html/web/themes/custom/boom/src/components/logo/logo.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array();
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                [],
                [],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}

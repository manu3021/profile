<?php

/* profiles/multipurpose_corporate_profile/modules/superfish/templates/superfish.html.twig */
class __TwigTemplate_610c99d4b6615f3c8c6b1ffe84ea801b9adc0d191dbbb5e8559a0693a6234da5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $tags = array();
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array(),
                array(),
                array()
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setTemplateFile($this->getTemplateName());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 16
        echo "
<ul id=\"";
        // line 17
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["id"]) ? $context["id"] : null), "html", null, true));
        echo "\" class=\"";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["menu_classes"]) ? $context["menu_classes"] : null), "html", null, true));
        echo "\">
  ";
        // line 18
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["menu_items"]) ? $context["menu_items"] : null), "html", null, true));
        echo "
</ul>
";
    }

    public function getTemplateName()
    {
        return "profiles/multipurpose_corporate_profile/modules/superfish/templates/superfish.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 18,  46 => 17,  43 => 16,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Default theme implementation of the Superfish menus.*/
/*  **/
/*  * Available variables:*/
/*  * - id: Unique menu identifier.*/
/*  * - menu_classes: Menu classes.*/
/*  * - menu_items: Menu tree.*/
/*  **/
/*  * @see template_preprocess_superfish()*/
/*  **/
/*  * @ingroup themeable*/
/*  *//* */
/* #}*/
/* */
/* <ul id="{{ id }}" class="{{ menu_classes }}">*/
/*   {{ menu_items }}*/
/* </ul>*/
/* */

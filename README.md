# AzureTranslator plugin for CakePHP

## Purpose

When creating contents, e. g. blog posts, it might be handy to automatically translate them into other languages. There are several translation services available, such as Azure Translator, that are even for free.

I created a CakePHP plugin that triggers the Azure Translator service interfaces, hands over text and receives the translated texts.

## Prerequisites

To use this plugin you need the following:
  * A running CakePHP 4 installation
  * An valid Azure subscription

## Setup Azure Translator

1. Log in to your Azure tenant
2. Add a **Translator Text** resource from the Azure marketplace (https://portal.azure.com/#create/Microsoft.CognitiveServicesTextTranslation
)
  * Choose the **F0** pricing tier that allows translation of up to 2M characters per month
3. Get one of the two API keys to use as authentication against Azure Translator

## Installation

1. You can install this plugin into your CakePHP application using [composer](https://getcomposer.org).

The recommended way to install composer packages is:

```
composer require jjoswig/AzureTranslator
```

2. Set up the Azure component by adding the API key to your environment variables (config/.env)

```
export AZURE_TRANSLATE_ENDPOINT="https://api-eur.cognitive.microsofttranslator.com"
export AZURE_TRANSLATE_KEY="**SUBSCRIPTION_KEY_HERE**"
```

## More Information
More information on this plugin and the Azure Translator service inparticular can be found here:
  * My Blog: https://julian.joswig-it.de
  * Azure Translator API: https://docs.microsoft.com/en-us/azure/cognitive-services/translator/reference/v3-0-reference
  * Azure Translator general information: https://azure.microsoft.com/en-us/services/cognitive-services/translator-text-api/ 
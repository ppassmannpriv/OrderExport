# Export Orders #

### Shopware v4 ###

---

This Plugin will create XML files to export orders. 

version: 0.0.1

For now there is just a simple listener watching for E-Mails to be sent out. 

Important todos:

- Check if the order is valid and is already payed for (maybe just let the orders be exported on a certain order-state selectable by the admin)
- Create a simple XML and save it in a folder.
- Create an admin menu, so settings can be made
- Give orders an extra attribute to mark the XML file for reference and preventing multiple XMLs for the same order

Not so-important todos:

- Look for a cool way to make XMLs templateable for all the cool middlewares and so on.
- List all orders and XMLs in a nice way for reference.
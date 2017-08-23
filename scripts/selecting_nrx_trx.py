import MySQLdb
import optparse

import peewee
from peewee import *
from peewee import fn
from datacatalogue import aggregating_rule_table
from datacatalogue import dcube_prescrx_prescriberlevel

#sql_db = peewee.MySQLDatabase("ddsplatform", host="localhost", port=3306, user="root", passwd="laravel")
sql_db = peewee.PostgresqlDatabase('mydb',user='dcube',password='Dcube2017', port = '5439', \
host='dcubeddsplatform-target.cbhavf18spr7.us-west-1.redshift.amazonaws.com')

class MySQLModel(peewee.Model):
    class Meta:
        database = sql_db

class dcube_prescrx_selection1rule1(MySQLModel):

    product_id = peewee.CharField(primary_key=True)

    product_name = peewee.CharField()

    state = peewee.CharField()

    years = peewee.CharField()

    NRxCount = peewee.CharField()

class dcube_prescrx_selection1rule2(MySQLModel):

    product_id = peewee.CharField(primary_key=True)

    product_name = peewee.CharField()

    state = peewee.CharField()

    years = peewee.CharField()

    TRxCount = peewee.CharField()



class dcube_prescrx_selection2rule1(MySQLModel):

    product_id = peewee.CharField(primary_key=True)

    product_name = peewee.CharField()

    market_id_1 = peewee.CharField()

    market_name_1 = peewee.CharField()

    city = peewee.CharField()

    months = peewee.CharField()

    years = peewee.CharField()

    NRxCount = peewee.CharField()
class dcube_prescrx_selection2rule2(MySQLModel):

    product_id = peewee.CharField(primary_key=True)

    product_name = peewee.CharField()

    market_id_1 = peewee.CharField()

    market_name_1 = peewee.CharField()

    city = peewee.CharField()

    months = peewee.CharField()

    years = peewee.CharField()

    TRxCount = peewee.CharField()



class dcube_prescrx_selection3rule1(MySQLModel):

    product_id = peewee.CharField(primary_key=True)

    product_name = peewee.CharField()

    state = peewee.CharField()

    city = peewee.CharField()

    years = peewee.CharField()

    NRxCount = peewee.CharField()

class dcube_prescrx_selection3rule2(MySQLModel):

    product_id = peewee.CharField(primary_key=True)

    product_name = peewee.CharField()

    state = peewee.CharField()

    city = peewee.CharField()

    years = peewee.CharField()

    TRxCount = peewee.CharField()

sql_db.connect()

#symphony_prescrx_aggregating_druglevel.create_table(True)
#symphony_prescrx_prescriberlevel.create_table(True)
dcube_prescrx_selection1rule1.create_table(True)
dcube_prescrx_selection1rule2.create_table(True)
dcube_prescrx_selection2rule1.create_table(True)
dcube_prescrx_selection2rule2.create_table(True)
dcube_prescrx_selection3rule1.create_table(True)
dcube_prescrx_selection3rule2.create_table(True)

def get_orm_query(rulename):
    conn = MySQLdb.connect(db='ddsplatform', user='root', passwd='laravel', charset="utf8")
    cursor = conn.cursor()
    query = 'select rule_orm from aggregating_rule_table where rule_name = "%s"' % rulename
    cursor.execute(query)
    row = cursor.fetchall()
    if row:
        row = row[0][0]

    cursor.close()
    conn.close()
    return row

def main(options):
    rulename = options.rulename
    #rule_orm = eval(aggregating_rule_table.get(rule_name = rulename).rule_orm)
    rule_orm = get_orm_query(rulename)
    if rule_orm:
        Dcube_selection_Result = eval(rule_orm)
    else:
        print "ORM Query Not Found!"

if __name__ == '__main__':
    parser = optparse.OptionParser()
    parser.add_option('-n', '--rulename', default=None, help='Rule Name')
    (options, args) = parser.parse_args()

    main(options)
